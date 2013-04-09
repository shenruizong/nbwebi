<?php
class NewsModel extends Model
{
    protected $_auto = array(
        array('create_time','time',1,'function'),
    );
}
