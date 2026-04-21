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
    
    public function formSubmit(array $params = []) : string;
    
    public function formReset(array $params = []) : string;
    
    public function formButton(array $params = []) : string;
}