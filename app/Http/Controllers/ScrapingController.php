<?php

    namespace App\Http\Controllers;

    use Symfony\Component\Process\Exception\ProcessFailedException;
    use Symfony\Component\Process\Process;

    class ScrapingController extends Controller
    {
        public function runScrape()
        {
            ini_set('max_execution_time', 600);
            $process = new Process(["python3", __DIR__ . "/ScrapeController.py"]);
            $process->run();

            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);

            }

            echo $process->getOutput();
        }
    }

?>
