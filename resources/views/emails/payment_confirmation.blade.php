@component('mail::message')
# Payment Confirmation

Dear {{ $payment->email }},

Thank you for your payment. Below are the details:

- **Amount**: {{ $payment->amount }}
- **Reservation ID**: {{ $payment->reservation_id }}
- **Date**: {{ $payment->date }}

If you have any questions or concerns, please contact us.

Thank you,<br>
{{ config('app.name') }}
@endcomponent