<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Search</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Search-Form-.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        .card-title {
            font-weight: bold;
            color: #007bff;
        }
        .card-text {
            font-size: 14px;
            color: #555;
        }
        .card-link {
            color: #007bff;
            text-decoration: none;
        }
        .card-link:hover {
            text-decoration: underline;
        }
        .people-also-ask h5 {
            cursor: pointer;
            color: #007bff;
        }
        .people-also-ask .card-body {
            display: none;
            margin-top: 10px;
        }
        .people-also-ask .card-body.show {
            display: block;
        }
    </style>
</head>

<body>
<div class="container pb-5 pt-5">
    <div class="col-md-9 col-xl-8 ml-auto mr-auto">
        <form action="{{ route('search') }}" method="GET">
            <div class="align-items-center form-row">
                <div class="col-sm form-group mb-3">
                    <input class="form-control form-control ps-4 pe-4 rounded-pill" type="text" name="search" placeholder="Search...">
                </div>
                <div class="col-sm-auto text-end form-group mb-3">
                    <button class="btn btn-primary ps-4 pe-4 rounded-pill" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    {{-- Knowledge Graph Section --}}
    @if(isset($searchResults["knowledgeGraph"]))
        <div class="row mb-4">
            <div class="col-md-9 col-xl-8 ml-auto mr-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $searchResults["knowledgeGraph"]["title"] ?? 'No Title Available' }}</h5>
                        <p class="card-text">{{ $searchResults["knowledgeGraph"]["description"] ?? 'No Description Available' }}</p>
                        @if(isset($searchResults["knowledgeGraph"]["website"]))
                            <a class="card-link" href="{{ $searchResults["knowledgeGraph"]["website"] }}">{{ $searchResults["knowledgeGraph"]["website"] }}</a>
                        @endif
                        <ul class="list-unstyled mt-3 mb-0">
                            @if(isset($searchResults["knowledgeGraph"]["rating"]))
                                <li>Rating: {{ $searchResults["knowledgeGraph"]["rating"] }} ({{ $searchResults["knowledgeGraph"]["ratingCount"] ?? 'No reviews' }})</li>
                            @endif
                            @if(isset($searchResults["knowledgeGraph"]["attributes"]["Address"]))
                                <li>Address: {{ $searchResults["knowledgeGraph"]["attributes"]["Address"] }}</li>
                            @endif
                            @if(isset($searchResults["knowledgeGraph"]["attributes"]["Hours"]))
                                <li>Hours: {{ $searchResults["knowledgeGraph"]["attributes"]["Hours"] }}</li>
                            @endif
                        </ul>
                        @if(isset($searchResults["knowledgeGraph"]["imageUrl"]))
                            <img src="{{ $searchResults["knowledgeGraph"]["imageUrl"] }}" alt="{{ $searchResults["knowledgeGraph"]["title"] ?? 'Image' }}" class="img-fluid mt-3">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Organic Search Results --}}
    @if(isset($searchResults["organic"]))
        @foreach($searchResults["organic"] as $result)
            <div class="row mb-3">
                <div class="col-md-9 col-xl-8 ml-auto mr-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $result["title"] ?? 'No Title Available' }}</h5>
                            <p class="card-text">{{ $result["snippet"] ?? 'No Snippet Available' }}</p>
                            @if(isset($result["link"]))
                                <a class="card-link" href="{{ $result["link"] }}">{{ $result["link"] }}</a>
                            @endif
                            @if(isset($result["sitelinks"]))
                                <ul class="list-unstyled mt-3">
                                    @foreach($result["sitelinks"] as $sitelink)
                                        <li><a href="{{ $sitelink["link"] }}">{{ $sitelink["title"] }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    {{-- People Also Ask Section --}}
    @if(isset($searchResults["peopleAlsoAsk"]))
        <div class="row mt-5">
            <div class="col-md-9 col-xl-8 ml-auto mr-auto">
                <h5 class="people-also-ask-title">People Also Ask</h5>
                <ul class="list-unstyled people-also-ask">
                    @foreach($searchResults["peopleAlsoAsk"] as $index => $paa)
                        <li class="mb-3">
                            <div class="card">
                                <div class="card-header question" data-index="{{ $index }}">
                                    <h6 class="card-title">{{ $paa["question"] ?? 'No Question Available' }}</h6>
                                </div>
                                <div class="card-body answer" id="answer-{{ $index }}">
                                    <p class="card-text">{{ $paa["snippet"] ?? 'No Snippet Available' }}</p>
                                    @if(isset($paa["link"]))
                                        <a href="{{ $paa["link"] }}" class="card-link">{{ $paa["link"] }}</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const questions = document.querySelectorAll('.people-also-ask .question');
        questions.forEach(question => {
            question.addEventListener('click', function () {
                const index = this.getAttribute('data-index');
                const answer = document.getElementById('answer-' + index);
                answer.classList.toggle('show');
            });
        });
    });
</script>
</body>

</html>
