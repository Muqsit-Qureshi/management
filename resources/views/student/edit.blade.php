
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Edit Student: {{ $student->student_name }}</h2>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="form-group">
                <label for="student_name">Student Name:</label>
                <input type="text" name="student_name" id="student_name" class="form-control" value="{{ $student->student_name }}" required>
            </div>


            <div class="form-group">
                <label for="class">Class:</label>
                <input type="text" name="class" id="class" class="form-control" value="{{ $student->class }}" required>
            </div>


            <div class="form-group">
                <label for="class_teacher_id">Class Teacher:</label>
                <select name="class_teacher_id" id="class_teacher_id" class="form-control" required>
                    <option value="" disabled>Select a class teacher</option>
                    @foreach ($classTeachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ $student->class_teacher_id == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="admission_date">Admission Date:</label>
                <input type="date" name="admission_date" id="admission_date" class="form-control" value="{{ $student->admission_date }}" required>
            </div>


            <div class="form-group">
                <label for="yearly_fees">Yearly Fees:</label>
                <input type="number" step="0.01" name="yearly_fees" id="yearly_fees" class="form-control" value="{{ $student->yearly_fees }}" required>
            </div>


            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
    </div>
</body>
</html>



