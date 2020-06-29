<?php

use \Ifsnop\Mysqldump\Mysqldump;

class BackupDatabase
{
    private $backupFolder;
    private $maxNumberFiles;

    private $host;
    private $database;
    private $username;
    private $password;

    /**
     * Construtor
     *
     * @param string $backupFolder Pasta onde serão armazenados os backups
     * @param int $maxNumberFiles Número máximo de backups que serão mantidos
     */
    public function __construct($backupFolder, $maxNumberFiles)
    {
        $this->backupFolder = $backupFolder;
        $this->maxNumberFiles = $maxNumberFiles;
    }

    /**
     * Define as informações de conexão com o banco de dados
     *
     * @param string $host
     * @param string $database
     * @param string $username
     * @param string $password
     */
    public function setDatabase($host, $database, $username, $password)
    {
        $this->host = $host;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Gera um backup
     *
     * @return void
     * @throws Exception
     */
    public function generate()
    {
        // Se as informações de conexão com o banco de dados não foram definidas
        if (empty($this->database) or empty($this->username) or empty($this->host)) {
     

         }

        // Gerando nome único para o arquivo
        date_default_timezone_set('America/Sao_Paulo');
        // $fileName = 'ROTA-BACKUP-'. date('d-m-y H:i:s').'.sql.zip';
        $fileName = 'ROTA-BACKUP-'.date('d-m-y H:i:s').'.sql';
        $filePath = $this->backupFolder . '/' . $fileName;
for($i = 0; $i <= 10; $i++){

        $dump = new Mysqldump("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);

    }

        // Gerando backup
        $dump->start($filePath);
        echo "<body style='background: black;'>
        <div align='center'>
        <img src='img/logo-rota.png'>
        <p style='color: white;font-size: 25px; align='center'>
        Executando Backup ...
        <br>Gerando Backup na pasta: '{$filePath}'</p>" . PHP_EOL.
        "</div>
        </body>";

        // Limpando backups antigos
        $this->clearOldFiles();
    }

    /**
     * Limpa os arquivos de backups antigos
     *
     * @return void
     */
    private function clearOldFiles()
    {
        // Buscando itens na pasta
        $files = new \DirectoryIterator($this->backupFolder);

        // Passando pelos itens
        $sortedFiles = array();
        foreach ($files as $file) {
            // Se for um arquivo
            if ($file->isFile()) {
                // Adicionando em um vetor, sendo o índice a data de modificação
                // do arquivo, para assim ordenarmos posteriormente
                $sortedFiles[$file->getMTime()] = $file->getPathName();
            }
        }

        // Ordena o vetor em ordem decrescente
        arsort($sortedFiles);

        // Passando pelos arquivos
        $numberFiles = 0;
        foreach ($sortedFiles as $file) {
            $numberFiles++;
            // Se a quantidade de arquivo for maior que a quantidade
            // máxima definida
            if ($numberFiles > $this->maxNumberFiles) {
                // Removemos o arquivo da pasta
                unlink($file);
                echo "<div align='center'><p style='color: red;font-size: 25px; align='center'>Apagado backup: '{$file}'</p></div>" . PHP_EOL;
            }
        }

    }

}
