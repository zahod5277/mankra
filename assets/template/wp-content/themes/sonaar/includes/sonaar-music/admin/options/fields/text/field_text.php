<?php
class Redux_Options_text {

    /**
     * Field Constructor.
     *
     * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
     *
     * @since Redux_Options 1.0.0
    */
    function __construct($field = array(), $value ='', $parent) {
        $this->field = $field;
		$this->value = $value;
		$this->args = isset($parent->args) ? $parent->args : array();
    }

    /**
     * Field Render Function.
     *
     * Takes the vars and outputs the HTML for the field in the settings
     *
     * @since Redux_Options 1.0.0
    */
    function render() {
        $class = (isset($this->field['class'])) ? $this->field['class'] : 'regular-text';

        if(isset($this->field["name"]))
			$name = $this->field["name"];
		else
        	$name = $this->args['opt_name'] . '[' . $this->field['id'] . ']';

        $placeholder = (isset($this->field['placeholder'])) ? ' placeholder="' . esc_attr($this->field['placeholder']) . '" ' : '';
        echo '<input type="text" id="' . $this->field['id'] . '" name="' .$name. '" ' . $placeholder . 'value="' . esc_attr($this->value) . '" class="' . $class . '" />';
        echo (isset($this->field['desc']) && !empty($this->field['desc'])) ? ' <span class="description">' . $this->field['desc'] . '</span>' : '';
    }
}
