<?php
namespace ChromeDevtoolsProtocol\Domain;

use ChromeDevtoolsProtocol\ContextInterface;
use ChromeDevtoolsProtocol\Model\Profiler\ConsoleProfileFinishedEvent;
use ChromeDevtoolsProtocol\Model\Profiler\ConsoleProfileStartedEvent;
use ChromeDevtoolsProtocol\Model\Profiler\GetBestEffortCoverageResponse;
use ChromeDevtoolsProtocol\Model\Profiler\SetSamplingIntervalRequest;
use ChromeDevtoolsProtocol\Model\Profiler\StartPreciseCoverageRequest;
use ChromeDevtoolsProtocol\Model\Profiler\StopResponse;
use ChromeDevtoolsProtocol\Model\Profiler\TakePreciseCoverageResponse;
use ChromeDevtoolsProtocol\Model\Profiler\TakeTypeProfileResponse;
use ChromeDevtoolsProtocol\SubscriptionInterface;

/**
 * Profiler domain.
 *
 * @generated This file has been auto-generated, do not edit.
 *
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 */
interface ProfilerDomainInterface
{
	/**
	 * Call Profiler.enable command.
	 *
	 * @param ContextInterface $ctx
	 *
	 * @return void
	 */
	public function enable(ContextInterface $ctx): void;


	/**
	 * Call Profiler.disable command.
	 *
	 * @param ContextInterface $ctx
	 *
	 * @return void
	 */
	public function disable(ContextInterface $ctx): void;


	/**
	 * Changes CPU profiler sampling interval. Must be called before CPU profiles recording started.
	 *
	 * @param ContextInterface $ctx
	 * @param SetSamplingIntervalRequest $request
	 *
	 * @return void
	 */
	public function setSamplingInterval(ContextInterface $ctx, SetSamplingIntervalRequest $request): void;


	/**
	 * Call Profiler.start command.
	 *
	 * @param ContextInterface $ctx
	 *
	 * @return void
	 */
	public function start(ContextInterface $ctx): void;


	/**
	 * Call Profiler.stop command.
	 *
	 * @param ContextInterface $ctx
	 *
	 * @return StopResponse
	 */
	public function stop(ContextInterface $ctx): StopResponse;


	/**
	 * Enable precise code coverage. Coverage data for JavaScript executed before enabling precise code coverage may be incomplete. Enabling prevents running optimized code and resets execution counters.
	 *
	 * @param ContextInterface $ctx
	 * @param StartPreciseCoverageRequest $request
	 *
	 * @return void
	 */
	public function startPreciseCoverage(ContextInterface $ctx, StartPreciseCoverageRequest $request): void;


	/**
	 * Disable precise code coverage. Disabling releases unnecessary execution count records and allows executing optimized code.
	 *
	 * @param ContextInterface $ctx
	 *
	 * @return void
	 */
	public function stopPreciseCoverage(ContextInterface $ctx): void;


	/**
	 * Collect coverage data for the current isolate, and resets execution counters. Precise code coverage needs to have started.
	 *
	 * @param ContextInterface $ctx
	 *
	 * @return TakePreciseCoverageResponse
	 */
	public function takePreciseCoverage(ContextInterface $ctx): TakePreciseCoverageResponse;


	/**
	 * Collect coverage data for the current isolate. The coverage data may be incomplete due to garbage collection.
	 *
	 * @param ContextInterface $ctx
	 *
	 * @return GetBestEffortCoverageResponse
	 */
	public function getBestEffortCoverage(ContextInterface $ctx): GetBestEffortCoverageResponse;


	/**
	 * Enable type profile.
	 *
	 * @param ContextInterface $ctx
	 *
	 * @return void
	 */
	public function startTypeProfile(ContextInterface $ctx): void;


	/**
	 * Disable type profile. Disabling releases type profile data collected so far.
	 *
	 * @param ContextInterface $ctx
	 *
	 * @return void
	 */
	public function stopTypeProfile(ContextInterface $ctx): void;


	/**
	 * Collect type profile.
	 *
	 * @param ContextInterface $ctx
	 *
	 * @return TakeTypeProfileResponse
	 */
	public function takeTypeProfile(ContextInterface $ctx): TakeTypeProfileResponse;


	/**
	 * Sent when new profile recording is started using console.profile() call.
	 *
	 * Listener will be called whenever event Profiler.consoleProfileStarted is fired.
	 *
	 * @param callable $listener
	 *
	 * @return SubscriptionInterface
	 */
	public function addConsoleProfileStartedListener(callable $listener): SubscriptionInterface;


	/**
	 * Sent when new profile recording is started using console.profile() call.
	 *
	 * Method will block until first Profiler.consoleProfileStarted event is fired.
	 *
	 * @param ContextInterface $ctx
	 *
	 * @return ConsoleProfileStartedEvent
	 */
	public function awaitConsoleProfileStarted(ContextInterface $ctx): ConsoleProfileStartedEvent;


	/**
	 * Subscribe to Profiler.consoleProfileFinished event.
	 *
	 * Listener will be called whenever event Profiler.consoleProfileFinished is fired.
	 *
	 * @param callable $listener
	 *
	 * @return SubscriptionInterface
	 */
	public function addConsoleProfileFinishedListener(callable $listener): SubscriptionInterface;


	/**
	 * Wait for Profiler.consoleProfileFinished event.
	 *
	 * Method will block until first Profiler.consoleProfileFinished event is fired.
	 *
	 * @param ContextInterface $ctx
	 *
	 * @return ConsoleProfileFinishedEvent
	 */
	public function awaitConsoleProfileFinished(ContextInterface $ctx): ConsoleProfileFinishedEvent;
}