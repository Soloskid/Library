@component('mail::message')
<div style="font-family: 'Segoe UI', sans-serif;">

<div style="background: linear-gradient(135deg, #1a1a2e, #0f3460); padding: 30px; text-align: center; border-radius: 10px; margin-bottom: 30px;">
    <h1 style="color: #f0c040; margin: 0;">📚 Osaro's Library</h1>
    <p style="color: #ccc; margin: 10px 0 0;">Email Verification</p>
</div>

<h2 style="color: #1a1a2e;">Hello {{ $notifiable->name }}! 👋</h2>

<p>Thank you for registering with Osaro's Library! Please verify your email address by clicking the button below.</p>

@component('mail::button', ['url' => $url, 'color' => 'primary'])
Verify Email Address
@endcomponent

<p style="color: #666;">This verification link will expire in 60 minutes.</p>

<p style="color: #666;">If you did not create an account, no further action is required.</p>

<p>Thank you for joining Osaro's Library! 😊</p>

<div style="background: #1a1a2e; padding: 20px; text-align: center; border-radius: 10px; margin-top: 30px;">
    <p style="color: #ccc; margin: 0;">&copy; 2026 Osaro's Library. All rights reserved.</p>
</div>

</div>
@endcomponent