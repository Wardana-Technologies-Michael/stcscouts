@extends('layouts.master')

@section('title', 'Kindling Legacy Scout Camp 2026 | 16th Colombo Scouts')
@section('meta_description', 'Official event portal for the Kindling Legacy Inter-School Scout Camp hosted by S. Thomas\' College Mount Lavinia. View schedule, campsite map, trainer spotlight, and download official invite packs.')

@section('content')
<style>
    :root {
        --stc-blue: #002B49;
        --stc-blue-light: #004B7F;
        --scout-green: #0F5132;
        --scout-green-light: #198754;
        --scout-gold: #FFC107;
        --scout-gold-dark: #E0A800;
        --dark-charcoal: #121824;
        --dark-card: #1E293B;
        --glass-border: rgba(255, 255, 255, 0.1);
        --glass-shadow: rgba(0, 0, 0, 0.25);
    }

    .kindling-body {
        background-color: var(--dark-charcoal);
        color: #F8FAFC;
        font-family: 'Poppins', sans-serif;
        overflow-x: hidden;
    }

    /* Hero Section Styles */
    .kl-hero {
        position: relative;
        padding: 100px 0 80px 0;
        background: linear-gradient(135deg, var(--stc-blue) 0%, #030712 100%);
        border-bottom: 4px solid var(--scout-gold);
        text-align: center;
    }

    .kl-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at center, rgba(15, 81, 50, 0.25) 0%, transparent 70%);
        pointer-events: none;
    }

    .kl-hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #FFF;
        margin-bottom: 10px;
        text-shadow: 0 4px 10px rgba(0,0,0,0.5);
    }

    .kl-hero-title span {
        color: var(--scout-gold);
    }

    .kl-hero-subtitle {
        font-size: 1.5rem;
        font-weight: 500;
        letter-spacing: 1px;
        color: #E2E8F0;
        margin-bottom: 30px;
    }

    .kl-hero-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid var(--glass-border);
        border-radius: 50px;
        padding: 8px 24px;
        font-size: 0.9rem;
        font-weight: 600;
        letter-spacing: 1px;
        color: var(--scout-gold);
        margin-bottom: 25px;
        backdrop-filter: blur(8px);
    }

    /* Countdown Timer */
    .countdown-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    .countdown-card {
        background: rgba(30, 41, 59, 0.7);
        border: 1px solid var(--glass-border);
        border-radius: 12px;
        width: 100px;
        padding: 15px 10px;
        box-shadow: 0 8px 32px var(--glass-shadow);
        backdrop-filter: blur(12px);
        transition: transform 0.3s ease;
    }

    .countdown-card:hover {
        transform: translateY(-5px);
        border-color: var(--scout-gold);
    }

    .countdown-val {
        font-size: 2rem;
        font-weight: 700;
        color: var(--scout-gold);
        display: block;
        line-height: 1.2;
    }

    .countdown-unit {
        font-size: 0.75rem;
        text-transform: uppercase;
        color: #94A3B8;
        font-weight: 500;
        letter-spacing: 0.5px;
    }

    /* Section Styles */
    .kl-section {
        padding: 80px 0;
    }

    .kl-section-alt {
        padding: 80px 0;
        background-color: #0F172A;
    }

    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-title {
        font-size: 2.2rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #FFF;
        position: relative;
        display: inline-block;
        padding-bottom: 15px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--stc-blue-light), var(--scout-gold));
        border-radius: 2px;
    }

    .section-desc {
        color: #94A3B8;
        font-size: 1.1rem;
        margin-top: 15px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Contingent Cards */
    .contingent-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        margin-top: 20px;
    }

    .contingent-card {
        background: var(--dark-card);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 25px;
        text-align: center;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .contingent-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: var(--scout-green-light);
    }

    .contingent-card.stc-host::before {
        background: linear-gradient(90deg, var(--stc-blue-light), var(--scout-gold));
    }

    .contingent-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.3);
        border-color: rgba(255, 193, 7, 0.3);
    }

    .contingent-school {
        font-size: 1.25rem;
        font-weight: 700;
        color: #FFF;
        margin-bottom: 10px;
    }

    .contingent-count {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--scout-gold);
        margin: 15px 0;
    }

    .contingent-note {
        font-size: 0.85rem;
        color: #94A3B8;
        background: rgba(0, 0, 0, 0.2);
        padding: 6px 12px;
        border-radius: 8px;
        display: inline-block;
    }

    /* Map Section */
    .map-card {
        background: var(--dark-card);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.25);
    }

    .map-image-container {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        border: 2px solid #334155;
    }

    .map-image {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.5s ease;
    }

    .map-image-container:hover .map-image {
        transform: scale(1.03);
    }

    .legend-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-top: 25px;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 12px;
        background: rgba(15, 23, 42, 0.4);
        padding: 10px 15px;
        border-radius: 10px;
        border-left: 4px solid #FFF;
    }

    .legend-text {
        font-size: 0.9rem;
        color: #E2E8F0;
        font-weight: 500;
    }

    /* Timeline Styles */
    .timeline-nav {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 40px;
        flex-wrap: wrap;
    }

    .timeline-tab {
        background: rgba(30, 41, 59, 0.6);
        border: 1px solid var(--glass-border);
        color: #94A3B8;
        padding: 12px 28px;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .timeline-tab.active {
        background: var(--scout-gold);
        color: var(--dark-charcoal);
        border-color: var(--scout-gold);
        box-shadow: 0 4px 15px rgba(255, 193, 7, 0.4);
    }

    .timeline-tab:hover:not(.active) {
        border-color: var(--scout-gold);
        color: #FFF;
    }

    .timeline-content {
        display: none;
    }

    .timeline-content.active {
        display: block;
        animation: fadeIn 0.5s ease forwards;
    }

    .timeline-list {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px 0;
    }

    .timeline-list::before {
        content: '';
        position: absolute;
        top: 0;
        bottom: 0;
        left: 30px;
        width: 4px;
        background: #334155;
        border-radius: 2px;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 40px;
        padding-left: 70px;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: 20px;
        top: 6px;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: var(--dark-charcoal);
        border: 4px solid var(--scout-gold);
        z-index: 2;
        transition: all 0.3s ease;
    }

    .timeline-item:hover::before {
        background: var(--scout-gold);
        transform: scale(1.2);
    }

    .timeline-time {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--scout-gold);
        margin-bottom: 5px;
    }

    .timeline-detail-card {
        background: var(--dark-card);
        border: 1px solid var(--glass-border);
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .timeline-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #FFF;
        margin-bottom: 8px;
    }

    .timeline-desc {
        color: #94A3B8;
        font-size: 0.95rem;
        line-height: 1.5;
        margin-bottom: 0;
    }

    /* Spotlight and Safety cards */
    .spotlight-card {
        background: linear-gradient(135deg, rgba(30, 41, 59, 0.9) 0%, rgba(15, 23, 42, 0.9) 100%);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        display: flex;
        gap: 30px;
        align-items: center;
        margin-bottom: 40px;
        flex-direction: column;
    }

    @media (min-width: 768px) {
        .spotlight-card {
            flex-direction: row;
        }
    }

    .spotlight-avatar {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        border: 4px solid var(--scout-gold);
        background: #334155;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3.5rem;
        color: var(--scout-gold);
        flex-shrink: 0;
        box-shadow: 0 4px 15px rgba(0,0,0,0.25);
    }

    .spotlight-name {
        font-size: 1.6rem;
        font-weight: 700;
        color: #FFF;
        margin-bottom: 5px;
    }

    .spotlight-title {
        font-size: 1rem;
        color: var(--scout-gold);
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 15px;
    }

    .spotlight-bio {
        color: #94A3B8;
        line-height: 1.6;
        font-size: 1rem;
    }

    .safety-alert-card {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.15) 0%, rgba(185, 28, 28, 0.05) 100%);
        border: 1px solid rgba(239, 68, 68, 0.3);
        border-radius: 20px;
        padding: 35px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .safety-title {
        color: #F87171;
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .safety-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .safety-list li {
        position: relative;
        padding-left: 30px;
        margin-bottom: 15px;
        color: #E2E8F0;
        font-size: 0.95rem;
        line-height: 1.5;
    }

    .safety-list li::before {
        content: '\f071';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        position: absolute;
        left: 0;
        top: 2px;
        color: #F87171;
        font-size: 0.95rem;
    }

    /* Downloads & Sponsors */
    .dl-card {
        background: var(--dark-card);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .dl-card:hover {
        transform: translateY(-5px);
        border-color: var(--scout-green-light);
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    }

    .dl-icon {
        font-size: 3rem;
        color: var(--scout-gold);
        margin-bottom: 20px;
    }

    .dl-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #FFF;
        margin-bottom: 10px;
    }

    .dl-desc {
        color: #94A3B8;
        font-size: 0.9rem;
        margin-bottom: 20px;
    }

    .dl-btn {
        background: var(--scout-green);
        border: none;
        color: #FFF;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .dl-btn:hover {
        background: var(--scout-green-light);
        color: #FFF;
        box-shadow: 0 4px 12px rgba(25, 135, 84, 0.3);
    }

    .sponsor-card {
        background: #FFF;
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        max-width: 600px;
        margin: 40px auto 0 auto;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    .sponsor-label {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #64748B;
        font-weight: 700;
        margin-bottom: 25px;
        display: block;
    }

    .sponsor-title {
        font-size: 2.2rem;
        font-weight: 800;
        color: #0F172A;
        letter-spacing: 0.5px;
        margin-bottom: 5px;
        text-transform: uppercase;
    }

    .sponsor-subtitle {
        font-size: 1rem;
        font-weight: 500;
        color: #475569;
        letter-spacing: 1px;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="kindling-body">
    <!-- Hero Header -->
    <header class="kl-hero">
        <div class="container">
            <span class="kl-hero-badge">Inter-School Camp Portal</span>
            <h1 class="kl-hero-title">Kindling <span>Legacy</span></h1>
            <p class="kl-hero-subtitle">16th Colombo Scout Group Event Hub</p>
            
            <div class="countdown-container">
                <div class="countdown-card">
                    <span class="countdown-val" id="days">--</span>
                    <span class="countdown-unit">Days</span>
                </div>
                <div class="countdown-card">
                    <span class="countdown-val" id="hours">--</span>
                    <span class="countdown-unit">Hours</span>
                </div>
                <div class="countdown-card">
                    <span class="countdown-val" id="minutes">--</span>
                    <span class="countdown-unit">Mins</span>
                </div>
                <div class="countdown-card">
                    <span class="countdown-val" id="seconds">--</span>
                    <span class="countdown-unit">Secs</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Overview Section -->
    <section class="kl-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Event Overview & Contingents</h2>
                <p class="section-desc">Hosted by S. Thomas' College, Mount Lavinia. Bringing together troops from premier schools across the island for a total of ~800 participants.</p>
            </div>

            <div class="contingent-grid">
                <div class="contingent-card stc-host">
                    <h3 class="contingent-school">S. Thomas' College (ML)</h3>
                    <p class="contingent-note">Host Contingent</p>
                    <div class="contingent-count">70</div>
                    <p class="contingent-note">Camping On-Site</p>
                </div>
                <div class="contingent-card">
                    <h3 class="contingent-school">STC Guruthalawe</h3>
                    <p class="contingent-note">Visiting School</p>
                    <div class="contingent-count">25+</div>
                    <p class="contingent-note">Friday Arrival (Boarding)</p>
                </div>
                <div class="contingent-card">
                    <h3 class="contingent-school">STC Bandarawela</h3>
                    <p class="contingent-note">Visiting School</p>
                    <div class="contingent-count">25+</div>
                    <p class="contingent-note">Friday Arrival (Boarding)</p>
                </div>
                <div class="contingent-card">
                    <h3 class="contingent-school">STC Prep School</h3>
                    <p class="contingent-note">Visiting School</p>
                    <div class="contingent-count">25</div>
                    <p class="contingent-note">Saturday Morning Arrival</p>
                </div>
                <div class="contingent-card">
                    <h3 class="contingent-school">Bishop's College</h3>
                    <p class="contingent-note">Invited Girls' School</p>
                    <div class="contingent-count">25</div>
                    <p class="contingent-note">Saturday Arrival</p>
                </div>
                <div class="contingent-card">
                    <h3 class="contingent-school">Ladies' College</h3>
                    <p class="contingent-note">Invited Girls' School</p>
                    <div class="contingent-count">25</div>
                    <p class="contingent-note">Saturday Arrival</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Campsite & Zoning Map -->
    <section class="kl-section-alt">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Campsite Layout & Zoning Map</h2>
                <p class="section-desc">Layout layout mapping for the grounds & sports complex area. Arrival logistics will follow the zoned sectors below.</p>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <div class="map-card">
                        <div class="map-image-container">
                            <img src="{{ asset('images/kindling_campsite_map.png') }}" alt="Campsite Zoning Map" class="map-image img-fluid" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <h3 class="text-white font-weight-bold mb-3">Zoning Details</h3>
                    <p class="text-justify text-color-light-scale-2">To accommodate up to 800 participants safely, the STC Mount Lavinia Grounds and Sports Complex have been structured into distinct zones. Specific arrivals will proceed to their allocated camping sectors or boarding blocks.</p>
                    
                    <div class="legend-grid">
                        <div class="legend-item" style="border-color: #3b82f6;">
                            <div class="legend-text"><strong>Zone A:</strong> STC ML Host Camping Area</div>
                        </div>
                        <div class="legend-item" style="border-color: #22c55e;">
                            <div class="legend-text"><strong>Zone B:</strong> Visiting Boys' Schools Camping</div>
                        </div>
                        <div class="legend-item" style="border-color: #ec4899;">
                            <div class="legend-text"><strong>Zone C:</strong> Invited Girls' Schools Hub</div>
                        </div>
                        <div class="legend-item" style="border-color: #eab308;">
                            <div class="legend-text"><strong>Zone D:</strong> Main Staging & Activities</div>
                        </div>
                        <div class="legend-item" style="border-color: #f97316;">
                            <div class="legend-text"><strong>Boarding:</strong> Guru & Banda Overnight Stay</div>
                        </div>
                        <div class="legend-item" style="border-color: #a855f7;">
                            <div class="legend-text"><strong>Dining Hall:</strong> Mass Catering & Vendor Stalls</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Detailed Run of Show Schedule -->
    <section class="kl-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Detailed Run of Show</h2>
                <p class="section-desc">Full schedule mapping out arrivals, opening ceremony, skill rotations, campfire ceremony, and campsite clearance.</p>
            </div>

            <div class="timeline-nav">
                <button class="timeline-tab active" onclick="switchTimeline('friday', this)">Friday (Arrival)</button>
                <button class="timeline-tab" onclick="switchTimeline('saturday', this)">Saturday (Main & Campfire)</button>
                <button class="timeline-tab" onclick="switchTimeline('sunday', this)">Sunday (Departure)</button>
            </div>

            <!-- Friday Timeline -->
            <div id="timeline-friday" class="timeline-content active">
                <div class="timeline-list">
                    <div class="timeline-item">
                        <div class="timeline-time">15:00 - 18:00</div>
                        <div class="timeline-detail-card">
                            <h4 class="timeline-title">Site Preparation</h4>
                            <p class="timeline-desc">STC ML organizing committee opens the Grounds and Sports Complex. Setting up campsite zones, desks, and ceremonial gateway.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">16:00 - 19:00</div>
                        <div class="timeline-detail-card">
                            <h4 class="timeline-title">Guruthalawe & Bandarawela Arrivals</h4>
                            <p class="timeline-desc">Welcome by the organizing committee. Escorted to Boarding Accommodation blocks and kit stored safely.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">19:00 - 20:00</div>
                        <div class="timeline-detail-card">
                            <h4 class="timeline-title">Overnight Contingent Dinner</h4>
                            <p class="timeline-desc">Dining Hall opens for STC Guruthalawe, STC Bandarawela, and the STC ML duty team.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">20:00 - 21:30</div>
                        <div class="timeline-detail-card">
                            <h4 class="timeline-title">Evening Briefing</h4>
                            <p class="timeline-desc">Safety briefing, site orientation, and schedule walkthrough for overnight contingents.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">21:30</div>
                        <div class="timeline-detail-card">
                            <h4 class="timeline-title">Lights Out</h4>
                            <p class="timeline-desc">Quiet hours commence. Scouts retire to their boarding rooms.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Saturday Timeline -->
            <div id="timeline-saturday" class="timeline-content">
                <div class="timeline-list">
                    <div class="timeline-item">
                        <div class="timeline-time">08:00 - 09:00</div>
                        <div class="timeline-detail-card">
                            <h4 class="timeline-title">All Invited Schools Arrival & Registration</h4>
                            <p class="timeline-desc">Liaisons register at designated desks. Tent pitching zones allocated. STC Prep contingent arrives. Guruthalawe & Bandarawela pitch tents.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">09:00 - 09:30</div>
                        <div class="timeline-detail-card">
                            <h4 class="timeline-title">Official Opening Ceremony</h4>
                            <p class="timeline-desc">Flag ceremony, National Anthem, and welcoming address. Troop Leader Sanija briefs all scout formations.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">09:30 - 12:30</div>
                        <div class="timeline-detail-card">
                            <h4 class="timeline-title">Training Stations (Rotations Round 1)</h4>
                            <p class="timeline-desc">Campfire skills and outdoor scouting challenges run by training coordinators.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">12:30 - 13:30</div>
                        <div class="timeline-detail-card">
                            <h4 class="timeline-title">Lunch break</h4>
                            <p class="timeline-desc">Mass catering served in the Dining Hall and vendor stalls area for all ~800 participants.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">13:30 - 15:30</div>
                        <div class="timeline-detail-card">
                            <h4 class="timeline-title">Training Stations (Rotations Round 2)</h4>
                            <p class="timeline-desc">Continuation of trainer-led activities and rifle shooting / archery challenges.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">18:00 - 18:30</div>
                        <div class="timeline-detail-card">
                            <h4 class="timeline-title">Campfire Assembly</h4>
                            <p class="timeline-desc">All ~800 scouts and distinguished guests gather in formation at the campfire circle. Final safety brief.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">18:30 - 21:00</div>
                        <div class="timeline-detail-card">
                            <h4 class="timeline-title">Grand Campfire Ceremony</h4>
                            <p class="timeline-desc">Ceremonial lighting, skits, scout songs, and performances representing each visiting troop.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">21:00 - 21:30</div>
                        <div class="timeline-detail-card">
                            <h4 class="timeline-title">Training Badge & Certificate Presentation</h4>
                            <p class="timeline-desc">Awarding participation certificates and campfire proficiency training acknowledgments.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">22:00</div>
                        <div class="timeline-detail-card">
                            <h4 class="timeline-title">Overnight Camp / Day-visit Departure</h4>
                            <p class="timeline-desc">Day-visit schools (including STC Prep) depart. Overnight scouts retire to camp tents.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sunday Timeline -->
            <div id="timeline-sunday" class="timeline-content">
                <div class="timeline-list">
                    <div class="timeline-item">
                        <div class="timeline-time">06:00 - 07:00</div>
                        <div class="timeline-detail-card">
                            <h4 class="timeline-title">Wake-Up & Break Camp</h4>
                            <p class="timeline-desc">Overnight scouts break tents, pack personal gear, and store equipment.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">07:00 - 08:00</div>
                        <div class="timeline-detail-card">
                            <h4 class="timeline-title">Farewell Breakfast</h4>
                            <p class="timeline-desc">Final morning catering served to all remaining overnight contingents.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">08:00 - 09:30</div>
                        <div class="timeline-detail-card">
                            <h4 class="timeline-title">Campsite Clearance & Clean-Up</h4>
                            <p class="timeline-desc">Scouts clean camping zones. Grounds returned to original state. Troop Leader inspects all sectors.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-time">09:30 - 10:00</div>
                        <div class="timeline-detail-card">
                            <h4 class="timeline-title">Final Parade & Departures</h4>
                            <p class="timeline-desc">Farewell parade, group photographs, and official departure of visiting schools.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trainer Spotlight & Safety -->
    <section class="kl-section-alt">
        <div class="container">
            <div class="row">
                <!-- Trainer Spotlight -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="section-header text-start mb-4">
                        <h2 class="section-title text-start">Trainer Spotlight</h2>
                    </div>
                    <div class="spotlight-card">
                        <div class="spotlight-avatar">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div>
                            <h3 class="spotlight-name">Mr. Geeth Ramesh</h3>
                            <p class="spotlight-title">Lead Campfire & Skills Trainer</p>
                            <p class="spotlight-bio">We are honoured to introduce Mr. Geeth Ramesh as the main training officer for Kindling Legacy 2026. He will lead Saturday's comprehensive badge training session, focusing on campfire skills, performance preparation, and advanced scouting techniques.</p>
                        </div>
                    </div>
                </div>

                <!-- Campfire Safety Rules -->
                <div class="col-lg-6">
                    <div class="section-header text-start mb-4">
                        <h2 class="section-title text-start" style="color: #F87171;">Campfire Safety & Rules</h2>
                    </div>
                    <div class="safety-alert-card">
                        <h3 class="safety-title"><i class="fas fa-exclamation-triangle"></i> Mandatory Safety Guidelines</h3>
                        <ul class="safety-list">
                            <li><strong>3-Meter Clearance Zone:</strong> A strict 3-meter safety perimeter must be kept clear around the campfire ring at all times. Only designated fire crew are allowed inside this zone.</li>
                            <li><strong>Lawn Staging Protection:</strong> The campfire firebed will be elevated on raised steel/staging structures to protect the grass and lawn surfaces from fire damage.</li>
                            <li><strong>Safety Marshals:</strong> Senior safety marshals will be positioned around the circle perimeter. All instructions from marshals must be followed immediately.</li>
                            <li><strong>Emergency Standby:</strong> Fire extinguishers, sand buckets, water hoses, and a first aid station will be on standby next to the campfire site.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Documents & Download Pack -->
    <section class="kl-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Documents & Downloads</h2>
                <p class="section-desc">Download invitation letters, confirmation checklists, and catering plans to prepare your contingent for the camp.</p>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="dl-card">
                        <div>
                            <div class="dl-icon"><i class="far fa-file-pdf"></i></div>
                            <h3 class="dl-title">Official Invitation Package</h3>
                            <p class="dl-desc">Includes the formal invite letter, full agenda, contact directory, and packing list specifications.</p>
                        </div>
                        <a href="{{ asset('scout_docs/kindling-legacy-invitation.pdf') }}" class="dl-btn" download><i class="fas fa-download"></i> Download PDF</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="dl-card">
                        <div>
                            <div class="dl-icon"><i class="far fa-file-pdf"></i></div>
                            <h3 class="dl-title">Mass-Catering Menu Layout</h3>
                            <p class="dl-desc">Details the meals provided (Friday dinner to Sunday breakfast), dietary options, and allergen notice info.</p>
                        </div>
                        <a href="{{ asset('scout_docs/kindling-legacy-menu-layout.pdf') }}" class="dl-btn" download><i class="fas fa-download"></i> Download PDF</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="dl-card">
                        <div>
                            <div class="dl-icon"><i class="far fa-file-pdf"></i></div>
                            <h3 class="dl-title">Contingent Confirmation</h3>
                            <p class="dl-desc">Sheet for submitting participating scout rosters, emergency contacts, and confirmation details.</p>
                        </div>
                        <a href="{{ asset('scout_docs/kindling-legacy-contingent-confirmation.pdf') }}" class="dl-btn" download><i class="fas fa-download"></i> Download PDF</a>
                    </div>
                </div>
            </div>

            <!-- Sponsor Section -->
            <div class="sponsor-card">
                <span class="sponsor-label">Strategic Corporate Partner</span>
                <h3 class="sponsor-title">John Keells Holdings</h3>
                <span class="sponsor-subtitle">Supporting Youth Leadership & Scouting Excellence</span>
            </div>
        </div>
    </section>
</div>

<script>
    // Countdown Timer logic
    // Set target date: October 16, 2026 at 09:00 AM (local time)
    const targetDate = new Date("October 16, 2026 09:00:00").getTime();

    function updateCountdown() {
        const now = new Date().getTime();
        const difference = targetDate - now;

        if (difference < 0) {
            document.getElementById("days").innerText = "00";
            document.getElementById("hours").innerText = "00";
            document.getElementById("minutes").innerText = "00";
            document.getElementById("seconds").innerText = "00";
            return;
        }

        const days = Math.floor(difference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((difference % (1000 * 60)) / 1000);

        document.getElementById("days").innerText = String(days).padStart(2, '0');
        document.getElementById("hours").innerText = String(hours).padStart(2, '0');
        document.getElementById("minutes").innerText = String(minutes).padStart(2, '0');
        document.getElementById("seconds").innerText = String(seconds).padStart(2, '0');
    }

    setInterval(updateCountdown, 1000);
    updateCountdown();

    // Timeline switcher logic
    function switchTimeline(day, tabElement) {
        // Deactivate all tabs
        document.querySelectorAll('.timeline-tab').forEach(tab => {
            tab.classList.remove('active');
        });
        
        // Deactivate all timeline content blocks
        document.querySelectorAll('.timeline-content').forEach(content => {
            content.classList.remove('active');
        });

        // Activate clicked tab
        tabElement.classList.add('active');

        // Activate corresponding content
        const targetTimeline = document.getElementById('timeline-' + day);
        if (targetTimeline) {
            targetTimeline.classList.add('active');
        }
    }
</script>
@endsection
