<?php namespace WiCS\Helpers\SpreadsheetHelpers;

/**
 * This class represents the 'Concrete Creator' in the Factory Design Pattern. 
 */
class ConcreteViewableModifyableSpreadsheetWithValidationCreator extends AbstractSpreadsheetCreator{
	public function FactoryMethod() {
        return new ViewableModifyableSpreadsheetWithValidation();
    }
}