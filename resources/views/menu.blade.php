<li class ="nav-item {{ request()->routeIs('company.index')?'active':''}}"><a class ="nav-link" href="{{route('company.index')}}">Компании</a></li>
<li class ="nav-item {{ request()->routeIs('staff.index')?'active':''}}"><a class ="nav-link" href="{{route('staff.index')}}">Сотрудники</a></li>

