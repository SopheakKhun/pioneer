<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class RequestTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateRequest()
    {
        $admin = \App\User::find(1);
        $request = factory('App\Request')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $request) {
            $browser->loginAs($admin)
                ->visit(route('admin.requests.index'))
                ->clickLink('Add new')
                ->select("customer_id", $request->customer_id)
                ->type("product_name", $request->product_name)
                ->type("prefer_date", $request->prefer_date)
                ->type("description", $request->description)
                ->press('Save')
                ->assertRouteIs('admin.requests.index')
                ->assertSeeIn("tr:last-child td[field-key='customer']", $request->customer->name)
                ->assertSeeIn("tr:last-child td[field-key='product_name']", $request->product_name)
                ->assertSeeIn("tr:last-child td[field-key='prefer_date']", $request->prefer_date)
                ->assertSeeIn("tr:last-child td[field-key='description']", $request->description);
        });
    }

    public function testEditRequest()
    {
        $admin = \App\User::find(1);
        $request = factory('App\Request')->create();
        $request2 = factory('App\Request')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $request, $request2) {
            $browser->loginAs($admin)
                ->visit(route('admin.requests.index'))
                ->click('tr[data-entry-id="' . $request->id . '"] .btn-info')
                ->select("customer_id", $request2->customer_id)
                ->type("product_name", $request2->product_name)
                ->type("prefer_date", $request2->prefer_date)
                ->type("description", $request2->description)
                ->press('Update')
                ->assertRouteIs('admin.requests.index')
                ->assertSeeIn("tr:last-child td[field-key='customer']", $request2->customer->name)
                ->assertSeeIn("tr:last-child td[field-key='product_name']", $request2->product_name)
                ->assertSeeIn("tr:last-child td[field-key='prefer_date']", $request2->prefer_date)
                ->assertSeeIn("tr:last-child td[field-key='description']", $request2->description);
        });
    }

    public function testShowRequest()
    {
        $admin = \App\User::find(1);
        $request = factory('App\Request')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $request) {
            $browser->loginAs($admin)
                ->visit(route('admin.requests.index'))
                ->click('tr[data-entry-id="' . $request->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='customer']", $request->customer->name)
                ->assertSeeIn("td[field-key='product_name']", $request->product_name)
                ->assertSeeIn("td[field-key='prefer_date']", $request->prefer_date)
                ->assertSeeIn("td[field-key='description']", $request->description);
        });
    }

}
