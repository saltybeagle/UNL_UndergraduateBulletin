<?php
class UNL_UndergraduateBulletin_Editions extends ArrayIterator
{
    public static $editions = array(
        2010,
        2011
    );

    /**
     * The last bulletin edition that was complete.
     *
     * @var string|int
     */
    public static $latest = 2010;

    public $options = array('format'=>'html');
    
     function __construct($options = array())
    {
        $this->options = $options + $this->options;
        return parent::__construct(self::$editions);
    }

    /**
     * Gets an array of all the editions from the latest edition.
     * 
     * @return UNL_UndergraduateBulletin_Editions The list of editions.
     */
    public static function getAll()
    {
        return new self();
    }

    /**
     * Get the latest edition
     *
     * @return UNL_UndergraduateBulletin_Edition
     */
    public static function getLatest()
    {
        return new UNL_UndergraduateBulletin_Edition(array('year'=>self::$latest));
    }

    /**
     * Get the current edition
     *
     * @return UNL_UndergraduateBulletin_Edition
     */
    function current()
    {
    	return new UNL_UndergraduateBulletin_Edition(array('year'=>parent::current()));
    }
}