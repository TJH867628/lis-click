<table>
    <th>Details</th>
    <th>Type</th>
    <th>Theme</th>
    <th>Present Mode</th>
    <th>Participants</th>
    <th>Review Status</th>
    <th>Upload At</th>
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
</table>
