@extends('layouts.app')

@section('title', 'Size Guide - Football Jersey Shop')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <h1 class="mb-4 text-center">Jersey Size Guide</h1>
            <p class="lead text-center text-muted mb-5">
                Find your perfect fit with our comprehensive sizing guide for football jerseys
            </p>
            
            <!-- Size Chart -->
            <div class="card mb-5">
                <div class="card-header bg-danger text-white">
                    <h3 class="mb-0">
                        <i class="fas fa-ruler me-2"></i> Adult Jersey Sizes
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Size</th>
                                    <th>Chest (cm)</th>
                                    <th>Length (cm)</th>
                                    <th>Sleeve (cm)</th>
                                    <th>Chest (inches)</th>
                                    <th>Length (inches)</th>
                                    <th>UK Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>XS</strong></td>
                                    <td>80-88</td>
                                    <td>66</td>
                                    <td>16</td>
                                    <td>31-35</td>
                                    <td>26</td>
                                    <td>6-8</td>
                                </tr>
                                <tr>
                                    <td><strong>S</strong></td>
                                    <td>88-96</td>
                                    <td>68</td>
                                    <td>17</td>
                                    <td>35-38</td>
                                    <td>27</td>
                                    <td>8-10</td>
                                </tr>
                                <tr class="table-warning">
                                    <td><strong>M</strong></td>
                                    <td>96-104</td>
                                    <td>70</td>
                                    <td>18</td>
                                    <td>38-41</td>
                                    <td>28</td>
                                    <td>10-12</td>
                                </tr>
                                <tr>
                                    <td><strong>L</strong></td>
                                    <td>104-112</td>
                                    <td>72</td>
                                    <td>19</td>
                                    <td>41-44</td>
                                    <td>28</td>
                                    <td>12-14</td>
                                </tr>
                                <tr>
                                    <td><strong>XL</strong></td>
                                    <td>112-120</td>
                                    <td>74</td>
                                    <td>20</td>
                                    <td>44-47</td>
                                    <td>29</td>
                                    <td>14-16</td>
                                </tr>
                                <tr>
                                    <td><strong>XXL</strong></td>
                                    <td>120-128</td>
                                    <td>76</td>
                                    <td>21</td>
                                    <td>47-50</td>
                                    <td>30</td>
                                    <td>16-18</td>
                                </tr>
                                <tr>
                                    <td><strong>XXXL</strong></td>
                                    <td>128-136</td>
                                    <td>78</td>
                                    <td>22</td>
                                    <td>50-53</td>
                                    <td>31</td>
                                    <td>18-20</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="alert alert-info mt-3">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Most Popular:</strong> Size M is highlighted as it's our most popular size choice.
                    </div>
                </div>
            </div>

            <!-- Youth Sizes -->
            <div class="card mb-5">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">
                        <i class="fas fa-child me-2"></i> Youth Jersey Sizes
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Size</th>
                                    <th>Age Range</th>
                                    <th>Chest (cm)</th>
                                    <th>Length (cm)</th>
                                    <th>Chest (inches)</th>
                                    <th>Length (inches)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>YXS</strong></td>
                                    <td>3-4 years</td>
                                    <td>56-58</td>
                                    <td>36</td>
                                    <td>22-23</td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td><strong>YS</strong></td>
                                    <td>5-6 years</td>
                                    <td>58-62</td>
                                    <td>39</td>
                                    <td>23-24</td>
                                    <td>15</td>
                                </tr>
                                <tr>
                                    <td><strong>YM</strong></td>
                                    <td>7-8 years</td>
                                    <td>62-66</td>
                                    <td>42</td>
                                    <td>24-26</td>
                                    <td>17</td>
                                </tr>
                                <tr>
                                    <td><strong>YL</strong></td>
                                    <td>9-10 years</td>
                                    <td>66-70</td>
                                    <td>45</td>
                                    <td>26-28</td>
                                    <td>18</td>
                                </tr>
                                <tr>
                                    <td><strong>YXL</strong></td>
                                    <td>11-12 years</td>
                                    <td>70-74</td>
                                    <td>48</td>
                                    <td>28-29</td>
                                    <td>19</td>
                                </tr>
                                <tr>
                                    <td><strong>YXXL</strong></td>
                                    <td>13-14 years</td>
                                    <td>74-78</td>
                                    <td>51</td>
                                    <td>29-31</td>
                                    <td>20</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- How to Measure -->
            <div class="card mb-5">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0">
                        <i class="fas fa-tape me-2"></i> How to Measure Yourself
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="mb-3">Measuring Instructions</h5>
                            <div class="measurement-steps">
                                <div class="step-item mb-4">
                                    <div class="d-flex">
                                        <div class="step-number me-3">1</div>
                                        <div>
                                            <h6>Chest Measurement</h6>
                                            <p>Measure around the fullest part of your chest, keeping the tape measure horizontal and snug but not tight.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="step-item mb-4">
                                    <div class="d-flex">
                                        <div class="step-number me-3">2</div>
                                        <div>
                                            <h6>Length Measurement</h6>
                                            <p>Measure from the highest point of your shoulder down to where you want the jersey to end.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="step-item mb-4">
                                    <div class="d-flex">
                                        <div class="step-number me-3">3</div>
                                        <div>
                                            <h6>Sleeve Measurement</h6>
                                            <p>Measure from the shoulder seam to the wrist with your arm slightly bent.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="measurement-tips bg-light p-4 rounded">
                                <h5 class="mb-3">Measuring Tips</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Use a flexible measuring tape
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Measure over light clothing
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Keep the tape level and snug
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Take measurements in front of a mirror
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Have someone help you for accuracy
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fit Types -->
            <div class="card mb-5">
                <div class="card-header bg-warning text-dark">
                    <h3 class="mb-0">
                        <i class="fas fa-tshirt me-2"></i> Jersey Fit Types
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="fit-type text-center">
                                <div class="fit-icon mb-3">
                                    <i class="fas fa-compress-alt fa-3x text-danger"></i>
                                </div>
                                <h5>Slim Fit</h5>
                                <p class="text-muted">
                                    Modern cut that follows the body's natural shape. 
                                    Perfect for athletic builds or those who prefer a fitted look.
                                </p>
                                <div class="alert alert-light">
                                    <small><strong>Recommendation:</strong> Choose your normal size</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fit-type text-center">
                                <div class="fit-icon mb-3">
                                    <i class="fas fa-expand-alt fa-3x text-primary"></i>
                                </div>
                                <h5>Regular Fit</h5>
                                <p class="text-muted">
                                    Classic fit with comfortable room throughout the body. 
                                    The most popular choice for everyday wear.
                                </p>
                                <div class="alert alert-light">
                                    <small><strong>Recommendation:</strong> Choose your normal size</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fit-type text-center">
                                <div class="fit-icon mb-3">
                                    <i class="fas fa-arrows-alt fa-3x text-success"></i>
                                </div>
                                <h5>Relaxed Fit</h5>
                                <p class="text-muted">
                                    Loose, comfortable fit with extra room. 
                                    Great for layering or a casual, comfortable feel.
                                </p>
                                <div class="alert alert-light">
                                    <small><strong>Recommendation:</strong> Consider sizing down</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Brand Specific -->
            <div class="card mb-5">
                <div class="card-header bg-info text-white">
                    <h3 class="mb-0">
                        <i class="fas fa-tags me-2"></i> Brand-Specific Sizing Notes
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Nike Jerseys</h5>
                            <ul>
                                <li>Generally true to size</li>
                                <li>Dri-FIT technology for moisture-wicking</li>
                                <li>Slim fit design on most models</li>
                            </ul>
                            
                            <h5 class="mt-4">Adidas Jerseys</h5>
                            <ul>
                                <li>Can run slightly large</li>
                                <li>Climacool technology</li>
                                <li>Consider sizing down for fitted look</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5>Puma Jerseys</h5>
                            <ul>
                                <li>True to size with athletic fit</li>
                                <li>dryCELL moisture management</li>
                                <li>Comfortable regular fit</li>
                            </ul>
                            
                            <h5 class="mt-4">Umbro Jerseys</h5>
                            <ul>
                                <li>Traditional generous fit</li>
                                <li>May run larger than other brands</li>
                                <li>Consider sizing down</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ -->
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h3 class="mb-0">
                        <i class="fas fa-question-circle me-2"></i> Sizing FAQ
                    </h3>
                </div>
                <div class="card-body">
                    <div class="accordion" id="sizingFAQ">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    What if I'm between two sizes?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#sizingFAQ">
                                <div class="accordion-body">
                                    If you're between sizes, we recommend choosing the larger size for a more comfortable fit, 
                                    or the smaller size if you prefer a fitted look. Consider the jersey's intended use - 
                                    go larger for casual wear or layering, smaller for athletic activities.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Do jerseys shrink after washing?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#sizingFAQ">
                                <div class="accordion-body">
                                    Modern football jerseys are made with synthetic materials that resist shrinking. 
                                    However, we recommend washing in cold water and air drying to maintain the original fit and quality.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Can I exchange if the size doesn't fit?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#sizingFAQ">
                                <div class="accordion-body">
                                    Yes! We offer free size exchanges within 30 days of purchase. 
                                    The jersey must be unworn with original tags attached. 
                                    <a href="{{ route('returns') }}">View our full return policy</a>.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Support -->
            <div class="text-center mt-5">
                <h4>Still Need Help?</h4>
                <p class="text-muted mb-4">Our sizing experts are here to help you find the perfect fit</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('contact') }}" class="btn btn-danger btn-lg">
                        <i class="fas fa-envelope me-2"></i> Contact Us
                    </a>
                    <a href="tel:+3225550123" class="btn btn-outline-danger btn-lg">
                        <i class="fas fa-phone me-2"></i> Call Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border: none;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        margin-bottom: 30px;
        border-radius: 15px;
        overflow: hidden;
    }

    .card-header {
        font-weight: 600;
        padding: 20px;
    }

    .table th {
        background-color: #212529;
        color: white;
        font-weight: 600;
        border: none;
    }

    .table td {
        vertical-align: middle;
        padding: 12px;
    }

    .step-number {
        width: 35px;
        height: 35px;
        background: var(--bs-danger);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        flex-shrink: 0;
    }

    .fit-type {
        padding: 20px;
        border-radius: 10px;
        background: #f8f9fa;
        height: 100%;
    }

    .fit-icon {
        margin-bottom: 15px;
    }

    .measurement-tips {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    }

    .accordion-button:not(.collapsed) {
        background-color: #fff5f5;
        color: var(--bs-danger);
    }

    .accordion-button:focus {
        box-shadow: 0 0 0 0.25rem rgba(233, 69, 96, 0.25);
    }

    @media (max-width: 768px) {
        .table-responsive {
            font-size: 0.9rem;
        }
        
        .fit-type {
            margin-bottom: 20px;
        }
    }
</style>
@endpush