<div>
    {{$student->name}}
    <div class="ml-12">
        @foreach($student->classes as $class)
            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                {{$class->class_name}}
            </div>
        @endforeach
        <div>
            <div class="form-group">
                <select name="classes[]" id="" multiple>
                    @foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class->class_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <input type="hidden" name="_token" id="csrf_token" value="{{csrf_token()}}">
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
