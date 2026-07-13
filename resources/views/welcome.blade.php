@extends('layouts.app')

@section('title', 'Home - Flydeals.lk')

@section('content')

<!-- Hero Section with Clean Background -->
<section class="hero">
    <div class="hero-content container">
        <h1>Experience Premium Travel</h1>
        <p>Book your perfect getaway with Flydeals.lk. We provide exclusive prices, luxury comfort, and unforgettable memories for all our passengers.</p>
    </div>
</section>

<!-- Clean Booking Card Overlapping Hero -->
<section class="container">
    <div class="booking-card">
        <h2>Book Your Journey</h2>
        <form id="searchForm">
            <div class="form-grid">
                <div class="form-group">
                    <label for="from">From</label>
                    <input type="text" id="from" class="form-control" placeholder="e.g. Colombo" value="Colombo" required>
                </div>
                <div class="form-group">
                    <label for="to">To</label>
                    <input type="text" id="to" class="form-control" placeholder="e.g. Jaffna" value="Jaffna" required>
                </div>
                <div class="form-group">
                    <label for="type">Journey Type</label>
                    <select id="type" class="form-control" required>
                        <option value="one-way">One Way</option>
                        <option value="return">Return</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Travel Date</label>
                    <input type="date" id="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="days">Duration (Days)</label>
                    <input type="number" id="days" class="form-control" placeholder="Optional" min="1">
                </div>
            </div>
            <div style="text-align: center; margin-top: 2rem;">
                <button type="button" class="btn btn-primary" id="btnSearch" style="width: 250px; font-size: 1.1rem; padding: 1rem;">
                    <i class="fa-solid fa-magnifying-glass"></i> Search Flights
                </button>
            </div>
        </form>
    </div>
</section>

<!-- Message from CEO -->
<section class="container ceo-section">
    <div class="ceo-grid">
        <div class="ceo-image">
            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=600&q=80" alt="CEO Message">
        </div>
        <div class="ceo-content">
            <h2 style="color: var(--primary-blue); font-size: 2.5rem;">A Message from our CEO</h2>
            <div class="ceo-quote">
                "At Flydeals.lk, we believe travel should be more than just reaching a destination—it should be an experience of absolute comfort and trust. We are dedicated to providing you with the best exclusive deals, uncompromising safety, and a highly responsive staff that is always ready to assist you. Thank you for choosing us."
            </div>
            <h4 style="color: var(--text-dark); margin-bottom: 0;">Mr. M.A. G. S.</h4>
            <p style="color: var(--text-muted);">Chief Executive Officer, Flydeals.lk</p>
        </div>
    </div>
</section>

<!-- Today's Special Deal -->
<section class="container" style="padding-bottom: 4rem;">
    <h2 style="text-align: center; margin-bottom: 3rem; font-size: 2.5rem;">Today's Exclusive Offer</h2>
    <div class="deal-card">
        <div>
            <div style="display: flex; align-items: center; gap: 0.5rem; color: var(--accent-color); font-weight: 700; margin-bottom: 0.5rem;">
                <i class="fa-solid fa-fire"></i> Hot Deal
            </div>
            <h3 style="font-size: 1.8rem; margin-bottom: 0.5rem; color: var(--text-dark);">Colombo <i class="fa-solid fa-arrow-right-arrow-left" style="color: var(--text-muted); font-size: 1.2rem; margin: 0 10px;"></i> Jaffna</h3>
            <p style="color: var(--text-muted); max-width: 400px;">Direct premium flights. Unbeatable prices and extra baggage allowance included.</p>
        </div>
        <div style="text-align: right;">
            <div style="font-size: 2.5rem; font-weight: 800; color: var(--primary-blue);">LKR 15,000</div>
            <p style="color: var(--text-muted); margin-bottom: 1rem;">Per person / One Way</p>
            <button class="btn btn-primary" onclick="openBookingModal()">Book This Offer</button>
        </div>
    </div>
</section>

<!-- Sleek Booking Modal -->
<div class="modal-overlay" id="bookingModal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeBookingModal()"><i class="fa-solid fa-xmark"></i></button>
        
        <div id="bookingFormContainer">
            <h2 style="text-align: center; margin-bottom: 0.5rem;">Passenger Details</h2>
            <p style="text-align: center; color: var(--text-muted); margin-bottom: 2rem;">Please fill in your details to confirm your booking.</p>
            
            <form id="bookingForm">
                <div class="form-group" style="margin-bottom: 1rem;">
                    <label for="b_name">Full Name</label>
                    <input type="text" id="b_name" class="form-control" required>
                </div>
                <div class="form-group" style="margin-bottom: 1rem;">
                    <label for="b_phone">Phone Number</label>
                    <input type="tel" id="b_phone" class="form-control" required>
                </div>
                <div class="form-group" style="margin-bottom: 1rem;">
                    <label for="b_whatsapp">WhatsApp Number</label>
                    <input type="tel" id="b_whatsapp" class="form-control">
                </div>
                <div class="form-group" style="margin-bottom: 2rem;">
                    <label for="b_address">Address</label>
                    <textarea id="b_address" class="form-control" rows="3" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary" style="width: 100%; font-size: 1.1rem; padding: 1rem;">Submit Booking</button>
            </form>
        </div>
        
        <!-- Enhanced Success State -->
        <div class="success-message" id="successMessage">
            <i class="fa-solid fa-check-circle"></i>
            <h2 style="font-size: 2rem; color: var(--text-dark); margin-bottom: 1rem;">Thank you!</h2>
            <p style="color: var(--text-muted); font-size: 1.1rem; margin-bottom: 2rem;">Your booking request has been successfully submitted. Our staff will contact you shortly to confirm everything.</p>
            <button class="btn btn-primary" style="width: 200px;" onclick="closeBookingModal()">Done</button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Date picker minimum date
    const dateInput = document.getElementById('date');
    if(dateInput) {
        dateInput.min = new Date().toISOString().split('T')[0];
    }

    // Modal logic
    const modal = document.getElementById('bookingModal');
    const formContainer = document.getElementById('bookingFormContainer');
    const successMsg = document.getElementById('successMessage');
    const form = document.getElementById('bookingForm');
    const btnSearch = document.getElementById('btnSearch');

    function openBookingModal() {
        modal.classList.add('active');
        formContainer.style.display = 'block';
        successMsg.style.display = 'none';
        form.reset();
    }

    function closeBookingModal() {
        modal.classList.remove('active');
    }

    if(btnSearch) {
        btnSearch.addEventListener('click', function() {
            if(document.getElementById('searchForm').checkValidity()) {
                openBookingModal();
            } else {
                document.getElementById('searchForm').reportValidity();
            }
        });
    }

    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeBookingModal();
        }
    });

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        formContainer.style.display = 'none';
        successMsg.style.display = 'block';
    });
</script>
@endsection
