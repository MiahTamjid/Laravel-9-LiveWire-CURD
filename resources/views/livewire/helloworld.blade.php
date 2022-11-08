<div>
    Miah Mohammad Tamjid
    {{ $nickname }}
    <input type="text" wire:model.debounce.0.01ms='nickname'>

    @if ($update==false) 
    <h1>Insert Student Data</h1>
    <form wire:submit.prevent="savedata">
        <div>
            <label for="">Name</label>
            <input type="text" wire:model="name">
        </div>
        <div>
            <label for="">Email</label>
            <input type="email" wire:model="email">
        </div>
        <div>
            <label for="">Image</label>
            <input type="file" wire:model="image">
        </div>
        <div>
            <input type="submit" value="Save">
        </div>
    </form>

    {{ $s_id }}
    <table border="1px">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        @foreach ($student as $student)
        <tr>
            <td>{{ $student['name'] }}</td>
            <td>{{ $student['email'] }}</td>
            <td>
                <img height="150" width="150" src="{{ Storage::url($student['image']) }}" alt="">
            </td>
            <td><a style="cursor: pointer; color:red" wire:click="deletestudent({{ $student['id'] }})">Delete</a></td>
            <td><a style="cursor: pointer; color:red" wire:click="updatestudent({{ $student['id'] }})">Update</a></td>
            
        </tr>
        @endforeach
    </table>

    @else
    <h1>Update Student Data</h1>
    <form wire:submit.prevent="updata">
        <input type="text" wire:model="s_id" hidden>
        <div>
            <label for="">Name</label>
            <input type="text" wire:model="name">
        </div>
        <div>
            <label for="">Email</label>
            <input type="email" wire:model="email">
        </div>
        <div>
            <label for="">Choose New Image</label>
            <input type="file" wire:model="imageup">
        </div>
        <div>
            <input type="submit" value="Update">
        </div>
        
    @endif
   
    

</div>

