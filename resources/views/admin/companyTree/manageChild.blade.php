<ul>
@foreach($childs as $child)
    <li>
    <span class="tf-nc" style="font-size:15px;">
    <a href="" data-toggle="tooltip" data-html="true"  id="" title="">
        <i class="ni ni-atom" style="font-size:30px; color:red"></i>
    </a>
    <br>
        {{ $child->name }}
        <br>
        {{ $child->reference_client_id }}
        </span>
        @if(count($child->childs))
            @include('admin.companyTree.manageChild',['childs' => $child->childs])
        @endif
    </li>
    
    @endforeach
</ul>