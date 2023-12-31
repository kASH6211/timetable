<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <table class="table-auto w-full border-collapse border">
        <thead class="bg-gray-200 w-full">
            <tr>
                <th>class</th>
                <th>subject</th>
                <th>teacher</th>
              </tr>
        </thead>
        <tbody>
    @foreach($combination as $comb)
    
        <tr>
            
           
                <td class="p-2 border text-sm text-gray-600">
                    {{  $comb->hassubject->ofclass->grade}}
                            </td>
               
                <td class="p-2 border text-sm text-gray-600">
                    {{  $comb->hassubject->subjectname}}({{  $comb->hassubject->id}})
                            </td>
                
           
                
                        
            <td class="p-2 border text-sm text-gray-600">
    {{  $comb->hasteacher->name}}({{  $comb->hasteacher->id}})
            </td>
        </tr>
     @endforeach
    </tbody>
    </table>
</div>
