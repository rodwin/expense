<?php
/**
 * Created by PhpStorm.
 * User: rodwin
 * Date: 1/5/2015
 * Time: 9:25 PM
 */

namespace Solitude\Profiler;

use Illuminate\View\Factory;
use Illuminate\Config\Repository;

class Profiler {

    /**
     * Added checkpoints.
     *
     * @var array
     */
    protected $checkpoints = array();

    /**
     * Illuminate view environment.
     *
     */
    protected $view;

    /**
     * Illuminate config repository.
     *
     */
    protected $config;

    /**
     * Create a new profiler instance.
     *
     * @return void
     */
    public function __construct(Factory $view,Repository $config)
    {
        $this->view = $view;
        $this->config = $config;
    }

    /**
     * Add a new checkpoint.
     *
     * @return void
     */
    public function addCheckpoint()
    {
        $checkpointTime = microtime(true);

        // Grab a debug backtrace array so we can use the line and file name being used to add
        // a checkpoint.
        $trace = debug_backtrace();

        // Build the variables to be used in our checkpoint message.
        $number = count($this->checkpoints) + 1;

        $line = $trace[0]['line'];

        $file = $trace[0]['file'];

        $executionTime = round($checkpointTime - $this->getStartTime(), 4);

        $this->checkpoints[] = compact('number', 'line', 'file', 'executionTime');
    }

    /**
     * Get the checkpoints.
     *
     * @return array
     */
    public function getCheckpoints()
    {
        return $this->checkpoints;
    }

    /**
     * Get the start time.
     *
     * @return int
     */
    protected function getStartTime()
    {
        if (defined('LARAVEL_START'))
        {
            return LARAVEL_START;
        }

        return microtime(true);
    }

    /**
     * Generate and return a report.
     *
     */
    public function generateReport()
    {
        $checkpoints = $this->checkpoints;

        $totalExecutionTime = round(microtime(true) - LARAVEL_START, 4);

        return $this->view->make('profiler::report', compact('checkpoints', 'totalExecutionTime'));
    }

    /**
     * Enable the profiler.
     *
     * @return void
     */
    public function enable()
    {
        $this->config->set('profiler::enabled', true);
    }

    /**
     * Disable the profiler.
     *
     * @return void
     */
    public function disable()
    {
        $this->config->set('profiler::enabled', false);
    }

} 