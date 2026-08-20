<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_contact_page_loads_successfully(): void
    {
        $response = $this->get('/lien-he');
        $response->assertStatus(200);
        $response->assertSee('LIÊN HỆ');
        $response->assertSee('form-contact');
    }

    public function test_contact_submit_validation_error(): void
    {
        $response = $this->postJson('/contact', [
            'contact' => [
                'name' => '',
                'phone' => '',
                'content' => '',
            ],
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name', 'phone', 'content']);
    }

    public function test_contact_submit_success(): void
    {
        $response = $this->postJson('/contact', [
            'contact' => [
                'name' => 'Nguyễn Văn Test',
                'phone' => '0912345678',
                'email' => 'test@example.com',
                'address' => 'Hà Nội',
                'content' => 'Tôi muốn được tư vấn giá thực phẩm sỉ chất lượng cao.',
            ],
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
        ]);

        $this->assertDatabaseHas('contacts', [
            'name' => 'Nguyễn Văn Test',
            'phone' => '0912345678',
        ]);
    }

    public function test_contact_completed_page_loads(): void
    {
        $response = $this->get('/contact-completed');
        $response->assertStatus(200);
        $response->assertSee('Gửi Liên Hệ Thành Công!');
    }

    public function test_agent_page_loads_and_submits_successfully(): void
    {
        $response = $this->get('/dai-ly');
        $response->assertStatus(200);
        $response->assertSee('ĐĂNG KÝ LÀM ĐẠI LÝ');

        $submitRes = $this->postJson('/contact', [
            'contact' => [
                'type' => 'agent',
                'name' => 'Trần Thị Đại Lý',
                'phone' => '0987654321',
                'email' => 'daily@example.com',
                'address' => 'TP. Hồ Chí Minh',
                'content' => 'Tôi muốn mở đại lý phân phối thịt bê và gà đồi.',
            ],
        ]);

        $submitRes->assertStatus(200);
        $submitRes->assertJson(['status' => 'success']);

        $this->assertDatabaseHas('contacts', [
            'type' => 'agent',
            'name' => 'Trần Thị Đại Lý',
            'phone' => '0987654321',
        ]);
    }
}
