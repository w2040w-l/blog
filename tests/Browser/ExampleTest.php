<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Model\User;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/index/now')
                    ->click('@highest')->assertSee('question');
            $browser->visit('/index/now')->with('#answer-55', function($answer){
                $answer->assertVue('icount', 10, 'a.btn-sm');
            });
        });
    }
}
