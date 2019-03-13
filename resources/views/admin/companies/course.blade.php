<h3>Courses</h3>
@if(count($company->courses) > 0)
<table class="table table-striped">
    <tr>
        <td>Name</td>
        <td>Faculty</td>
        <td>Qualification</td>
        <td>Fees</td>
        <td>Duration</td>
    </tr>
    <tbody>

        @foreach($company->courses as $course)
            <tr>
                <td><a href="{{ route('admin.courses.edit',[$course->id]) }}">{{ $course->name }}</a></td>

                <td>{{ $course->category->name }}</td>
                <td>{{$course->qualification->name}}</td>
                <td>{{$course->fees}}</td>
                <td>{{$course->duration}}</td>
            </tr>
        @endforeach


</table>
@else

<div>no record found</div>
@endif