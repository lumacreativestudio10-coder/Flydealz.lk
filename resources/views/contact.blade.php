@extends('layouts.app')

@section('title', 'Contact Us - Flydeals.lk')

@section('content')
<div class="container" style="padding: 4rem 0;">
    <div style="text-align: center; margin-bottom: 4rem;">
        <img src="{{ asset('images/Logo.png') }}" alt="Flydeals.lk Logo" style="height: 90px; border-radius: 8px; margin-bottom: 2rem; box-shadow: var(--shadow-sm);">
        <h1 style="font-size: 3rem;">Let's Connect</h1>
        <p style="color: var(--text-muted); max-width: 600px; margin: 0 auto; font-size: 1.1rem;">Whether you're ready to book or just need some travel advice, our team of experts is here for you.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 4rem; align-items: start;">
        
        <!-- Contact Info Card -->
        <div style="background: var(--surface); padding: 2.5rem; border-radius: var(--radius); box-shadow: var(--shadow-md); border-top: 4px solid var(--primary-blue);">
            <h2 style="font-size: 1.8rem; margin-bottom: 2rem;">Headquarters</h2>
            
            <div style="display: flex; gap: 1.2rem; margin-bottom: 2rem; align-items: flex-start;">
                <div style="background: rgba(10, 66, 117, 0.1); padding: 1rem; border-radius: 50%;">
                    <i class="fa-solid fa-location-dot" style="color: var(--primary-blue); font-size: 1.5rem;"></i>
                </div>
                <div>
                    <h4 style="margin-bottom: 0.5rem; color: var(--text-dark);">Office Address</h4>
                    <p style="color: var(--text-muted); line-height: 1.6;">178, Main Street,<br>Eravur,<br>Sri Lanka, 30300</p>
                </div>
            </div>
            
            <div style="display: flex; gap: 1.2rem; margin-bottom: 2rem; align-items: flex-start;">
                <div style="background: rgba(10, 66, 117, 0.1); padding: 1rem; border-radius: 50%;">
                    <i class="fa-solid fa-phone" style="color: var(--primary-blue); font-size: 1.5rem;"></i>
                </div>
                <div>
                    <h4 style="margin-bottom: 0.5rem; color: var(--text-dark);">Direct Line</h4>
                    <p style="color: var(--text-muted); font-size: 1.1rem;">077 932 7789</p>
                </div>
            </div>
            
            <div style="display: flex; gap: 1.2rem; margin-bottom: 2rem; align-items: flex-start;">
                <div style="background: rgba(10, 66, 117, 0.1); padding: 1rem; border-radius: 50%;">
                    <i class="fa-brands fa-whatsapp" style="color: var(--primary-blue); font-size: 1.5rem;"></i>
                </div>
                <div>
                    <h4 style="margin-bottom: 0.5rem; color: var(--text-dark);">WhatsApp Support</h4>
                    <p style="color: var(--text-muted); font-size: 1.1rem;">+94 74 383 1311</p>
                </div>
            </div>
            
            <div style="display: flex; gap: 1.2rem; margin-bottom: 2rem; align-items: flex-start;">
                <div style="background: rgba(10, 66, 117, 0.1); padding: 1rem; border-radius: 50%;">
                    <i class="fa-solid fa-envelope" style="color: var(--primary-blue); font-size: 1.5rem;"></i>
                </div>
                <div>
                    <h4 style="margin-bottom: 0.5rem; color: var(--text-dark);">Email Us</h4>
                    <p style="color: var(--text-muted); font-size: 1.1rem;">info@flydealz.lk</p>
                </div>
            </div>
        </div>

        <!-- Contact Form Card -->
        <div style="background: var(--surface); padding: 2.5rem; border-radius: var(--radius); box-shadow: var(--shadow-lg);">
            <h2 style="font-size: 1.8rem; margin-bottom: 2rem;">Send an Inquiry</h2>
            <form onsubmit="event.preventDefault(); alert('Message Sent Successfully!'); this.reset();">
                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" class="form-control" placeholder="John Doe" required>
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" class="form-control" placeholder="john@example.com" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" class="form-control" placeholder="Optional">
                    </div>
                </div>
                
                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label for="subject">Inquiry Type</label>
                    <select id="subject" class="form-control">
                        <option value="flight">Flight Booking</option>
                        <option value="holiday">Holiday Package</option>
                        <option value="support">Customer Support</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                
                <div class="form-group" style="margin-bottom: 2rem;">
                    <label for="message">Your Message</label>
                    <textarea id="message" class="form-control" rows="5" placeholder="How can we help you?" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary" style="width: 100%; font-size: 1.1rem; padding: 1rem;">
                    <i class="fa-regular fa-paper-plane"></i> Send Message
                </button>
            </form>
        </div>
        
    </div>
</div>
@endsection
