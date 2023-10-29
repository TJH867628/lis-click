<main class="table">
<section class="table__header">
    <h1>Submission List</h1>
</section>
<section class="table__body">
<table>
    <thead>
        <th>Details</th>
        <th>Type</th>
        <th>Theme</th>
        <th>Present Mode</th>
        <th>Participants</th>
        <th>Review Status</th>
        <th>Upload At</th>
    </thead>
    <tbody>
    @foreach($submissionInfo as $submission)
    <tr>
        <td>
            <p>Submission Code</p>
            {{$submission->submissionCode}}
            <p>Title</p>
            {{$submission->submissionTitle}}
        </td>
        <td>{{$submission->submissionType}}</td>
        <td>{{$submission->subTheme}}</td>
        <td>{{$submission->presentMode}}</td>
        <td>
            <p>Participants 1</p>
            {{ $submission->participants1 }}
            @if( $submission->participants2 != null)
                <p>Participants 2</p>
                {{ $submission->participants2 }}
            @endif
            @if( $submission->participants3 != null)
                <p>Participants 3</p>
                {{ $submission->participants3 }}
            @endif
        </td>
        <td>{{ $submission->reviewStatus }}</td>
        <td>{{ $submission->created_at }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
</section>
</main>