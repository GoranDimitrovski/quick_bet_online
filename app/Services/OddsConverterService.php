<?php

namespace App\Services;

use App\Interfaces\OddsConterterInterface;
use App\Models\Odd;
use Sharapov\OddsConverter\OddsConverter as OddsConverter;
use Illuminate\Support\Facades\Validator;
use App\Events\AddOddsToLogEvent;

class OddsConverterService implements OddsConterterInterface {

    /**
     * Validation rules for fraction odds
     * @var type 
     */
    private $fractionRules = ['value' => ['required', 'regex:/(?<![\/\d])(?:\d+)\/(?:\d+)(?![\/\d])/']];

    /**
     * Validations rules for decimal odds
     * @var type 
     */
    private $decimalRules = ['value' => ['required', 'regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/']];

    /**
     * Validation rules for american odds
     * @var type 
     */
    private $americanRules = ['value' => ['required', 'regex:(-?\d+(?:\.\d+)?+)']];

    /**
     * Method for converting odds
     * @param type $value
     * @param type $type
     * @param OddsConverter $converter
     */
    public function convert($value, $type) {

        if (isset($type)) {

            $validator = $this->createValidation($value, $type);

            if (!$validator->fails()) {

                switch ($type) {
                    case 'fraction':
                        return $this->convertFromFraction($value);

                    case 'decimal':
                        return $this->convertFromFraction($value);

                    case 'american':
                        return $this->convertFromFraction($value);
                }
            } else {
                return false;
            }
        }
    }

    /**
     * Method for creating validation based on the odds
     * @param type $value
     * @param type $type
     * @return type
     */
    private function createValidation($value, $type) {

        switch ($type) {
            case 'fraction':
                return Validator::make(['value' => $value, 'type' => $type], $this->fractionRules);

            case 'decimal':
                return Validator::make(['value' => $value, 'type' => $type], $this->decimalRules);

            case 'american':
                return Validator::make(['value' => $value, 'type' => $type], $this->americanRules);
        }
    }

    /**
     * Method that converts from fraction
     * @param type $value
     * @return type
     */
    private function convertFromFraction($value) {

        $odds = Odd::where('fraction', (string) $value)->select('fraction', 'decimal', 'american')->first();
        $odds = is_null($odds) ? $this->getMissingOdds((string) $value) : $odds->toArray();
        $this->logEvent($odds);

        return $odds;
    }

    /**
     * Method that converts from decimal
     * @param type $value
     * @return type
     */
    private function convertFromDecimal($value) {

        $odds = Odd::where('decimal', (float) $value)->select('fraction', 'decimal', 'american')->first();
        $odds = is_null($odds) ? $this->getMissingOdds((string) number_format((float) $value, 2, '.', '')) : $odds->toArray();
        $this->logEvent($odds);

        return $odds;
    }

    /**
     * Method that converts form american
     * @param type $value
     * @return type
     */
    private function convertFromAmerican($value) {

        $odds = Odd::where('american', (float) $value)->select('fraction', 'decimal', 'american')->first();
        $odds = is_null($odds) ? $this->getMissingOdds((string) number_format((float) $value, 2, '.', '')) : $odds->toArray();
        $this->logEvent($odds);

        return $odds;
    }

    /**
     * Method that gets missing odds from third party converting class
     * @param type $value
     * @return type
     */
    private function getMissingOdds($value) {
        $converter = new OddsConverter();
        $converter->setOdd($value);

        return[
            'fraction' => $converter->getFractional(),
            'decimal' => $converter->getDecimal(),
            'american' => number_format((float) $converter->getMoneyline(), 2, '.', '')
        ];
    }

    /**
     * Method for logging data that the user entered
     * @param type $odds
     */
    private function logEvent($odds) {
        list($fraction, $decimal, $american) = array_values($odds);
        $userId = \Auth::user()->id;
        event(new AddOddsToLogEvent($userId, $fraction, $decimal, $american));
    }

}
