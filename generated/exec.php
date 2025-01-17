<?php

namespace Safe;

use Safe\Exceptions\ExecException;

/**
 * exec executes the given
 * command.
 *
 * @param string $command The command that will be executed.
 * @param array|null $output If the output argument is present, then the
 * specified array will be filled with every line of output from the
 * command.  Trailing whitespace, such as \n, is not
 * included in this array.  Note that if the array already contains some
 * elements, exec will append to the end of the array.
 * If you do not want the function to append elements, call
 * unset on the array before passing it to
 * exec.
 * @param int|null $result_code If the result_code argument is present
 * along with the output argument, then the
 * return status of the executed command will be written to this
 * variable.
 * @return string The last line from the result of the command.  If you need to execute a
 * command and have all the data from the command passed directly back without
 * any interference, use the passthru function.
 *
 * Returns FALSE on failure.
 *
 * To get the output of the executed command, be sure to set and use the
 * output parameter.
 * @throws ExecException
 *
 */
function exec(string $command, ?array &$output = null, ?int &$result_code = null): string
{
    error_clear_last();
    $result = \exec($command, $output, $result_code);
    if ($result === false) {
        throw ExecException::createFromPhpError();
    }
    return $result;
}


/**
 * proc_nice changes the priority of the current
 * process by the amount specified in priority. A
 * positive priority will lower the priority of the
 * current process, whereas a negative priority
 * will raise the priority.
 *
 * proc_nice is not related to
 * proc_open and its associated functions in any way.
 *
 * @param int $priority The new priority value, the value of this may differ on platforms.
 *
 * On Unix, a low value, such as -20 means high priority
 * wheras a positive value have a lower priority.
 *
 * For Windows the priority parameter have the
 * following meanings:
 * @throws ExecException
 *
 */
function proc_nice(int $priority): void
{
    error_clear_last();
    $result = \proc_nice($priority);
    if ($result === false) {
        throw ExecException::createFromPhpError();
    }
}


/**
 * This function is identical to the backtick operator.
 *
 * @param string $cmd The command that will be executed.
 * @return string A string containing the output from the executed command, FALSE if the pipe
 * cannot be established or NULL if an error occurs or the command produces no output.
 * @throws ExecException
 *
 */
function shell_exec(string $cmd): string
{
    error_clear_last();
    $result = \shell_exec($cmd);
    if ($result === null) {
        throw ExecException::createFromPhpError();
    }
    return $result;
}


/**
 * system is just like the C version of the
 * function in that it executes the given
 * command and outputs the result.
 *
 * The system call also tries to automatically
 * flush the web server's output buffer after each line of output if
 * PHP is running as a server module.
 *
 * If you need to execute a command and have all the data from the
 * command passed directly back without any interference, use the
 * passthru function.
 *
 * @param string $command The command that will be executed.
 * @param int|null $result_code If the result_code argument is present, then the
 * return status of the executed command will be written to this
 * variable.
 * @return string Returns the last line of the command output on success.
 * @throws ExecException
 *
 */
function system(string $command, ?int &$result_code = null): string
{
    error_clear_last();
    $result = \system($command, $result_code);
    if ($result === false) {
        throw ExecException::createFromPhpError();
    }
    return $result;
}
