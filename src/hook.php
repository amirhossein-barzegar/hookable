<?php

/**
 * Do stuff after registering specific hook
 *
 * @param $hook
 * @param $callback
 *
 * @return bool
 */
function do_action($hook, $callback = null): bool
{
    # Stores all of our callbacks
    static $callbacks;
    # Stores all of our hooks
    static $hooks;
    
    # Available hooks to call
    static $available_actions = [
        'register_header',
        'register_body',
        'register_footer'
    ];
    
    # Do stuff and return true if entered a valid hook else return false
    if (in_array($hook, $available_actions)) {
        
        # If callback is null means we are calling this function in view to include specific hook and related functions
        if (is_null($callback)) {
            if (isset($callbacks)) {
                foreach ($callbacks as $key => $call) {
                    if ($hooks[$key] == $hook) {
                        if (function_exists($call)) {
                            echo call_user_func($call);
                        } else {
                            error_log("Function {$call} does not exists!\t[".__FILE__."] \n", 3, 'log.txt',__FILE__);
                            return false;
                        }
                    }
                }
                return true;
            } else {
                return false;
            }
        } else {
            if (function_exists($callback)) {
                # Add specific callback to callbacks array
                $callbacks[] = $callback;
                # Add specific hook to callbacks array
                $hooks[] = $hook;
                return true;
            } else {
                error_log("Function {$callback} does not exists!\t[".__FILE__."] \n", 3, 'log.txt');
                return false;
            }
        }
    } else {
        error_log("{$hook} is an invalid hook!\t[".__FILE__."] \n", 3, 'log.txt',__FILE__);
        return false;
    }
}

/**
 * If header.php exists return true else return false
 * @return bool
 */
function getHeader(): bool
{
    $fileName = str_replace('\\', '/', dirname(__DIR__)) . '/header.php';
    if (!file_exists($fileName)) {
        error_log("File {$fileName} does not exists!\t[".__FILE__."] \n", 3, 'log.txt',__FILE__);
        return false;
    } else {
        require_once $fileName;
        return true;
    }
}

/**
 * If main.php exists return true else return false
 * @return bool
 */
function getMain(): bool
{
    $fileName = str_replace('\\', '/', dirname(__DIR__)) . '/main.php';
    if (!file_exists($fileName)) {
        error_log("File {$fileName} does not exists!\t[".__FILE__."] \n", 3, 'log.txt',__FILE__);
        return false;
    } else {
        require_once $fileName;
        return true;
    }
}

/**
 * If footer.php exists return true else return false
 * @return bool
 */
function getFooter(): bool
{
    $fileName = str_replace('\\', '/', dirname(__DIR__)) . '/footer.php';
    if (!file_exists($fileName)) {
        error_log("File {$fileName} does not exists!\t[".__FILE__."] \n", 3, 'log.txt',__FILE__);
        return false;
    } else {
        require_once $fileName;
        return true;
    }
}