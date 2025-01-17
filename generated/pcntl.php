<?php

namespace Safe;

use Safe\Exceptions\PcntlException;

/**
 * pcntl_getpriority gets the priority of
 * process_id. Because priority levels can differ between
 * system types and kernel versions, please see your system's getpriority(2)
 * man page for specific details.
 *
 * @param int $process_id If NULL, the process id of the current process is used.
 * @param int $mode One of PRIO_PGRP, PRIO_USER
 * or PRIO_PROCESS.
 * @return int pcntl_getpriority returns the priority of the process.  A lower numerical value causes more favorable
 * scheduling.
 * @throws PcntlException
 *
 * @psalm-pure
 */
function pcntl_getpriority(int $process_id = null, int $mode = PRIO_PROCESS): int
{
    error_clear_last();
    if ($mode !== PRIO_PROCESS) {
        $result = \pcntl_getpriority($process_id, $mode);
    } elseif ($process_id !== null) {
        $result = \pcntl_getpriority($process_id);
    } else {
        $result = \pcntl_getpriority();
    }
    if ($result === false) {
        throw PcntlException::createFromPhpError();
    }
    return $result;
}


/**
 * pcntl_setpriority sets the priority of
 * process_id.
 *
 * @param int $priority priority is generally a value in the range
 * -20 to 20. The default priority
 * is 0 while a lower numerical value causes more
 * favorable scheduling.  Because priority levels can differ between
 * system types and kernel versions, please see your system's setpriority(2)
 * man page for specific details.
 * @param int $process_id If NULL, the process id of the current process is used.
 * @param int $mode One of PRIO_PGRP, PRIO_USER
 * or PRIO_PROCESS.
 * @throws PcntlException
 *
 * @psalm-pure
 */
function pcntl_setpriority(int $priority, int $process_id = null, int $mode = PRIO_PROCESS): void
{
    error_clear_last();
    if ($mode !== PRIO_PROCESS) {
        $result = \pcntl_setpriority($priority, $process_id, $mode);
    } elseif ($process_id !== null) {
        $result = \pcntl_setpriority($priority, $process_id);
    } else {
        $result = \pcntl_setpriority($priority);
    }
    if ($result === false) {
        throw PcntlException::createFromPhpError();
    }
}


/**
 * The pcntl_signal_dispatch function calls the signal
 * handlers installed by pcntl_signal for each pending
 * signal.
 *
 * @throws PcntlException
 *
 * @psalm-pure
 */
function pcntl_signal_dispatch(): void
{
    error_clear_last();
    $result = \pcntl_signal_dispatch();
    if ($result === false) {
        throw PcntlException::createFromPhpError();
    }
}


/**
 * The pcntl_sigprocmask function adds, removes or sets blocked
 * signals, depending on the mode parameter.
 *
 * @param int $mode Sets the behavior of pcntl_sigprocmask. Possible
 * values:
 *
 * SIG_BLOCK: Add the signals to the
 * currently blocked signals.
 * SIG_UNBLOCK: Remove the signals from the
 * currently blocked signals.
 * SIG_SETMASK: Replace the currently
 * blocked signals by the given list of signals.
 *
 * @param array $signals List of signals.
 * @param array|null $old_signals The old_signals parameter is set to an array
 * containing the list of the previously blocked signals.
 * @throws PcntlException
 *
 * @psalm-pure
 */
function pcntl_sigprocmask(int $mode, array $signals, ?array &$old_signals = null): void
{
    error_clear_last();
    $result = \pcntl_sigprocmask($mode, $signals, $old_signals);
    if ($result === false) {
        throw PcntlException::createFromPhpError();
    }
}


/**
 * The pcntl_sigtimedwait function operates in exactly
 * the same way as pcntl_sigwaitinfo except that it takes
 * two additional parameters, seconds and
 * nanoseconds, which enable an upper bound to be placed
 * on the time for which the script is suspended.
 *
 * @param array $signals Array of signals to wait for.
 * @param array|null $info The info is set to an array containing
 * information about the signal. See
 * pcntl_sigwaitinfo.
 * @param int $seconds Timeout in seconds.
 * @param int $nanoseconds Timeout in nanoseconds.
 * @return int pcntl_sigtimedwait returns a signal number on success.
 * @throws PcntlException
 *
 * @psalm-pure
 */
function pcntl_sigtimedwait(array $signals, ?array &$info = [], int $seconds = 0, int $nanoseconds = 0): int
{
    error_clear_last();
    $result = \pcntl_sigtimedwait($signals, $info, $seconds, $nanoseconds);
    if ($result === false) {
        throw PcntlException::createFromPhpError();
    }
    return $result;
}


/**
 * The pcntl_sigwaitinfo function suspends execution of the
 * calling script until one of the signals given in signals
 * are delivered. If one of the signal is already pending (e.g. blocked by
 * pcntl_sigprocmask),
 * pcntl_sigwaitinfo will return immediately.
 *
 * @param array $signals Array of signals to wait for.
 * @param array|null $info The info parameter is set to an array containing
 * information about the signal.
 *
 * The following elements are set for all signals:
 *
 * signo: Signal number
 * errno: An error number
 * code: Signal code
 *
 *
 * The following elements may be set for the SIGCHLD signal:
 *
 * status: Exit value or signal
 * utime: User time consumed
 * stime: System time consumed
 * pid: Sending process ID
 * uid: Real user ID of sending process
 *
 *
 * The following elements may be set for the SIGILL,
 * SIGFPE, SIGSEGV and
 * SIGBUS signals:
 *
 * addr: Memory location which caused fault
 *
 *
 * The following element may be set for the SIGPOLL
 * signal:
 *
 * band: Band event
 * fd: File descriptor number
 *
 * @return int Returns a signal number on success.
 * @throws PcntlException
 *
 * @psalm-pure
 */
function pcntl_sigwaitinfo(array $signals, ?array &$info = []): int
{
    error_clear_last();
    $result = \pcntl_sigwaitinfo($signals, $info);
    if ($result === false) {
        throw PcntlException::createFromPhpError();
    }
    return $result;
}
