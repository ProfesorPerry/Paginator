<?php


namespace App\Paginator;


class Paginator
{

    /**
     * @var int
     */
    private $perPage;

    /**
     * @var int
     */
    private $totalPages;

    /**
     * @var int|null
     */
    private $offset;

    /**
     * @var array
     */
    private $chunk;

    /**
     * Paginator constructor.
     * @param array $config
     * @param array $resultSet
     */
    public function __construct(array $config, array $resultSet)
    {
        $this->perPage = $config['per_page'];
        $this->totalPages = ceil(count($resultSet) / $config['per_page']);
        $this->offset = $this->setOffset($config['per_page']);
        $this->chunk = array_slice($resultSet, $this->offset, $config['per_page']);
    }

    /**
     * @param int $perPage
     * @return int|null
     */
    private function setOffset(int $perPage)
    {
        $offset = null;

        if (isset($_GET['page'])) {
            $offset = ($_GET['page'] - 1) * $perPage;

            if ($offset < 0) {
                $offset = 0;
            }
        }

        return $offset;
    }

    /**
     * @return mixed
     */
    public function display()
    {
        $page = !empty($_GET['page']) ? $_GET['page'] : 1;
        $totalPages = $this->totalPages;
        return include $_SERVER['DOCUMENT_ROOT'] . '/src/includes/links.php';
    }

    /**
     * @return array
     */
    public function getChunk()
    {
        return $this->chunk;
    }
}