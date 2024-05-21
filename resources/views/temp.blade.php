<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Temp</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <h1>
        Email Sent
        <form action="{{ route('contacts.search') }}" method="GET">
            <input type="text" name="query" placeholder="Search contacts" id="search">
            <button type="submit">Search</button>
        </form>
    </h1>
</body>
<script>
    $(document).ready(function() {
        alert()
    $('#search').on('keyup', function() {
        const query = $(this).val();
        $.ajax({
            url: "/api/list",
            type: "GET",
            data: {'query': query},
            success: function(data) {
                // Update your page with the search results
                $('#search-results').html(data);
            }
        });
    });
});
</script>
</html>
