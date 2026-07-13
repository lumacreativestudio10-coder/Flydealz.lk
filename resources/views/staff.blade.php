@extends('layouts.app')

@section('title', 'Our Staff - Flydeals.lk')

@section('content')
<div class="container" style="padding: 4rem 0;">
    <div style="text-align: center; margin-bottom: 4rem;">
        <h1 style="font-size: 3rem;">Meet Our Expert Team</h1>
        <p style="color: var(--text-muted); max-width: 600px; margin: 0 auto; font-size: 1.1rem;">Dedicated professionals working around the clock to make your travel experience seamless.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
        <!-- Staff Member 1 -->
        <div style="background: var(--surface); padding: 2.5rem 1rem; border-radius: var(--radius); text-align: center; box-shadow: var(--shadow-md);">
            <div style="width: 120px; height: 120px; border-radius: 50%; background: #e2e8f0; margin: 0 auto 1.5rem; overflow: hidden; border: 3px solid var(--border-color);">
                <img src="https://ui-avatars.com/api/?name=John+Doe&background=0A4275&color=fff&size=120" alt="John Doe" style="width: 100%; height: auto;">
            </div>
            <h3 style="margin-bottom: 0.5rem; font-size: 1.25rem;">John Doe</h3>
            <p style="color: var(--secondary-blue); font-weight: 600; margin-bottom: 1rem;">Senior Travel Consultant</p>
            <p style="color: var(--text-muted); font-size: 0.95rem;">Expert in luxury travel and corporate bookings.</p>
        </div>
        
        <!-- Staff Member 2 -->
        <div style="background: var(--surface); padding: 2.5rem 1rem; border-radius: var(--radius); text-align: center; box-shadow: var(--shadow-md);">
            <div style="width: 120px; height: 120px; border-radius: 50%; background: #e2e8f0; margin: 0 auto 1.5rem; overflow: hidden; border: 3px solid var(--border-color);">
                <img src="https://ui-avatars.com/api/?name=Jane+Smith&background=0A4275&color=fff&size=120" alt="Jane Smith" style="width: 100%; height: auto;">
            </div>
            <h3 style="margin-bottom: 0.5rem; font-size: 1.25rem;">Jane Smith</h3>
            <p style="color: var(--secondary-blue); font-weight: 600; margin-bottom: 1rem;">Customer Relations</p>
            <p style="color: var(--text-muted); font-size: 0.95rem;">Ensuring every client gets the best possible service.</p>
        </div>

        <!-- Staff Member 3 -->
        <div style="background: var(--surface); padding: 2.5rem 1rem; border-radius: var(--radius); text-align: center; box-shadow: var(--shadow-md);">
            <div style="width: 120px; height: 120px; border-radius: 50%; background: #e2e8f0; margin: 0 auto 1.5rem; overflow: hidden; border: 3px solid var(--border-color);">
                <img src="https://ui-avatars.com/api/?name=Alan+Walker&background=0A4275&color=fff&size=120" alt="Alan Walker" style="width: 100%; height: auto;">
            </div>
            <h3 style="margin-bottom: 0.5rem; font-size: 1.25rem;">Alan Walker</h3>
            <p style="color: var(--secondary-blue); font-weight: 600; margin-bottom: 1rem;">Booking Agent</p>
            <p style="color: var(--text-muted); font-size: 0.95rem;">Specialist in local and regional flight arrangements.</p>
        </div>
    </div>
</div>
@endsection
