<?php

class IssueTest extends CDbTestCase
{
    public $fixtures = array(
        'issues' => 'Issue',
    );
    
    public function testGetTypes()
    {
        $options = Issue::model()->typeOptions;
        
        $this->assertTrue(is_array($options));
        $this->asserttrue(count($options) == 3);
        $this->assertTrue(in_array('Bug', $options));
        $this->assertTrue(in_array('Feature', $options));
        $this->assertTrue(in_array('Task', $options));
    }
    
    public function testGetStatus()
    {
        $options = Issue::model()->statusOptions;
        
        $this->assertTrue(is_array($options));
        $this->asserttrue(count($options) == 3);
        $this->assertTrue(in_array('Not yest started', $options));
        $this->assertTrue(in_array('Started', $options));
        $this->assertTrue(in_array('Finished', $options));
                
    }
    
    public function testGetTypeText()
    {
        $this->assertTrue('Task' == $this->issues('issueTask')->getTypeText());
        
    }
    
    public function testGetStatusText()
    {
        $this->assertTrue('Not yest started' == $this->issues('issueTask')->getStatusText());
        
    }
}
