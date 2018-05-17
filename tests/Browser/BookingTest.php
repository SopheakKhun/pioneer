<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class BookingTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreateBooking()
    {
        $admin = \App\User::find(1);
        $booking = factory('App\Booking')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $booking) {
            $browser->loginAs($admin)
                ->visit(route('admin.bookings.index'))
                ->clickLink('Add new')
                ->select("customer_id", $booking->customer_id)
                ->type("installer", $booking->installer)
                ->type("date_install", $booking->date_install)
                ->type("model", $booking->model)
                ->type("serial", $booking->serial)
                ->press('Save')
                ->assertRouteIs('admin.bookings.index')
                ->assertSeeIn("tr:last-child td[field-key='customer']", $booking->customer->name)
                ->assertSeeIn("tr:last-child td[field-key='installer']", $booking->installer)
                ->assertSeeIn("tr:last-child td[field-key='date_install']", $booking->date_install)
                ->assertSeeIn("tr:last-child td[field-key='model']", $booking->model)
                ->assertSeeIn("tr:last-child td[field-key='serial']", $booking->serial);
        });
    }

    public function testEditBooking()
    {
        $admin = \App\User::find(1);
        $booking = factory('App\Booking')->create();
        $booking2 = factory('App\Booking')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $booking, $booking2) {
            $browser->loginAs($admin)
                ->visit(route('admin.bookings.index'))
                ->click('tr[data-entry-id="' . $booking->id . '"] .btn-info')
                ->select("customer_id", $booking2->customer_id)
                ->type("installer", $booking2->installer)
                ->type("date_install", $booking2->date_install)
                ->type("model", $booking2->model)
                ->type("serial", $booking2->serial)
                ->press('Update')
                ->assertRouteIs('admin.bookings.index')
                ->assertSeeIn("tr:last-child td[field-key='customer']", $booking2->customer->name)
                ->assertSeeIn("tr:last-child td[field-key='installer']", $booking2->installer)
                ->assertSeeIn("tr:last-child td[field-key='date_install']", $booking2->date_install)
                ->assertSeeIn("tr:last-child td[field-key='model']", $booking2->model)
                ->assertSeeIn("tr:last-child td[field-key='serial']", $booking2->serial);
        });
    }

    public function testShowBooking()
    {
        $admin = \App\User::find(1);
        $booking = factory('App\Booking')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $booking) {
            $browser->loginAs($admin)
                ->visit(route('admin.bookings.index'))
                ->click('tr[data-entry-id="' . $booking->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='customer']", $booking->customer->name)
                ->assertSeeIn("td[field-key='installer']", $booking->installer)
                ->assertSeeIn("td[field-key='date_install']", $booking->date_install)
                ->assertSeeIn("td[field-key='model']", $booking->model)
                ->assertSeeIn("td[field-key='serial']", $booking->serial);
        });
    }

}
