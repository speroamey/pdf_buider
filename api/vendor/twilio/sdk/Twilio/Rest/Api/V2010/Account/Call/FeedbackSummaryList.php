<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Call;

use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class FeedbackSummaryList extends ListResource {
    /**
     * Construct the FeedbackSummaryList
     * 
     * @param Version $version Version that contains the resource
     * @param string $accountSid The unique id of the Account responsible for
     *                           creating this Call
     * @return \Twilio\Rest\Api\V2010\Account\Call\FeedbackSummaryList 
     */
    public function __construct(Version $version, $accountSid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('accountSid' => $accountSid);

        $this->uri = '/Accounts/' . rawurlencode($accountSid) . '/Calls/FeedbackSummary.json';
    }

    /**
     * Create a new FeedbackSummaryInstance
     * 
     * @param \DateTime $startDate The start_date
     * @param \DateTime $endDate The end_date
     * @param array|Options $options Optional Arguments
     * @return FeedbackSummaryInstance Newly created FeedbackSummaryInstance
     */
    public function create($startDate, $endDate, $options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'StartDate' => Serialize::iso8601Date($startDate),
            'EndDate' => Serialize::iso8601Date($endDate),
            'IncludeSubaccounts' => Serialize::booleanToString($options['includeSubaccounts']),
            'StatusCallback' => $options['statusCallback'],
            'StatusCallbackMethod' => $options['statusCallbackMethod'],
        ));

        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new FeedbackSummaryInstance($this->version, $payload, $this->solution['accountSid']);
    }

    /**
     * Constructs a FeedbackSummaryContext
     * 
     * @param string $sid The sid
     * @return \Twilio\Rest\Api\V2010\Account\Call\FeedbackSummaryContext 
     */
    public function getContext($sid) {
        return new FeedbackSummaryContext($this->version, $this->solution['accountSid'], $sid);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.FeedbackSummaryList]';
    }
}