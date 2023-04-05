<?php

namespace Tests;

use Tests\TestCase;
require_once 'src/hook.php';
class HookTest extends TestCase
{
    public function setUp(): void
    {
    
    }
    
    public function tearDown(): void
    {
    
    }
    
    public function test_should_enter_a_valid_hook()
    {
        $output = do_action('invalid');
        $this->assertFalse($output);
    }
    
    public function test_should_enter_a_valid_callback_in_do_action()
    {
        $output = do_action('invalid', 'invalid');
        $this->assertFalse($output);
    }
    
    public function test_should_enter_valid_hook_and_valid_callback()
    {
        $output = do_action('invalid', 'invalid');
        $this->assertFalse($output);
    }
    
    public function test_header_file_should_be_exist()
    {
        $fileName = $this->getFileNameFromRoot('header.php');
        $result = getHeader();
        if(file_exists($fileName)) {
            $this->assertTrue($result);
        } else {
            $this->assertTrue($result);
        }
    }
    
    public function test_main_file_should_be_exists()
    {
        $fileName = $this->getFileNameFromRoot('main.php');
        $result = getMain();
        if(file_exists($fileName)) {
            $this->assertTrue($result);
        } else {
            $this->assertTrue($result);
        }
    }
    
    public function test_footer_file_should_be_exists()
    {
        $fileName = $this->getFileNameFromRoot('footer.php');
        $result = getFooter();
        if(file_exists($fileName)) {
            $this->assertTrue($result);
        } else {
            $this->assertTrue($result);
        }
    }
}