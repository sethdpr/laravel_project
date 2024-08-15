@extends('layouts.app')

@section('content')
<style>
    .faq-section {
        background-color: #f7f7f7;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .faq-section .card-header {
        background-color: #d32f2f;
        color: white;
        font-size: 1.5rem;
        border-radius: 10px 10px 0 0;
        padding: 15px;
        text-align: center;
    }

    .faq-section .faq-item {
        padding: 15px;
        border-bottom: 1px solid #ddd;
    }

    .faq-section .faq-item:last-child {
        border-bottom: none;
    }

    .faq-section .faq-item h5 {
        color: #d32f2f;
    }

    .faq-section .faq-item p {
        color: #333;
        margin-top: 10px;
    }

    .btn-edit, .btn-delete, .btn-add {
        padding: 0.25rem 0.5rem;
        font-size: 0.8rem;
        cursor: pointer;
    }

    .btn-edit {
        background-color: white;
        color: black;
        border-width: 2px;
        border-color: #f0f0f0;
        margin-right: 5px;
    }

    .btn-edit:hover {
        background-color: #f0f0f0;
        color: black;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
    }

    .btn-delete:hover {
        background-color: #c82333;
        color: white;
    }

    .btn-add {
        background-color: #d32f2f;
        color: white;
        margin-top: 20px;
    }

    .btn-add:hover {
        background-color: #b71c1c;
        color: white;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card faq-section">
                <div class="card-header">Frequently Asked Questions</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($faqs->isEmpty())
                        <p>No FAQs available at the moment.</p>
                    @else
                        @foreach($faqs as $faq)
                            <div class="faq-item">
                                <h5>{{ $faq->question }}</h5>
                                <p>{{ $faq->answer }}</p>
                                @if(Auth::check() && Auth::user()->isAdmin())
                                    <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-edit">Edit</a>
                                    <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this FAQ?');">Delete</button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    @endif

                    @if(Auth::check() && Auth::user()->isAdmin())
                        <div class="text-center">
                            <a href="{{ route('faq.create') }}" class="btn btn-add">Add FAQ</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection