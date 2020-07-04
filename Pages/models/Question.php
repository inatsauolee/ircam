<?php
class Question
{
    // Properties
    public $id;
    public $label;
    public $type;
    public $tawalt_ID;
    public $answered;

    // Methods
    function __construct($id, $label, $type, $tawalt_ID)
    {
        $this->id = $id;
        $this->label = $label;
        $this->type = $type;
        $this->tawalt_ID = $tawalt_ID;
        $this->answered = 0;
    }

    function get_label()
    {
        return $this->label;
    }

    function get_tawalt_ID()
    {
        return $this->tawalt_ID;
    }

    function set_answered($answered)
    {
        return $this->answered = $answered;
    }
}
