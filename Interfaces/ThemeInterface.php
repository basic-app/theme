<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Theme\Interfaces;

interface ThemeInterface
{
    public function tag(array $params = []) : string;

    public function formGroup(array $params = []) : string;
    
    public function formInput(array $params = []) : string;

    public function formInputGroup(array $params = []) : string;
    
    public function formPassword(array $params = []) : string;

    public function formPasswordGroup(array $params = []) : string;
    
    public function formUpload(array $params = []) : string;

    public function formUploadGroup(array $params = []) : string;
    
    public function formTextarea(array $params = []) : string;

    public function formTextareaGroup(array $params = []) : string;
    
    public function formDropdown(array $params = []) : string;

    public function formDropdownGroup(array $params = []) : string;
    
    public function formMultiselect(array $params = []) : string;

    public function formMultiselectGroup(array $params = []) : string;
    
    public function formCheckbox(array $params = []) : string;

    public function formCheckboxGroup(array $params = []) : string;
    
    public function formRadio(array $params = []) : string;
    
    public function formLabel(array $params = []) : string;

    public function formError(array $params = []) : string;
    
    public function formSubmit(array $params = []) : string;
    
    public function formReset(array $params = []) : string;
    
    public function formButton(array $params = []) : string;

    public function alertPrimary(array $params = []) : string;

    public function alertSecondary(array $params = []) : string;

    public function alertSuccess(array $params = []) : string;

    public function alertDanger(array $params = []) : string;

    public function alertWarning(array $params = []) : string;

    public function alertInfo(array $params = []) : string;

    public function alertLight(array $params = []) : string;

    public function alertDark(array $params = []) : string;
}