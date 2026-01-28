<div>


    <div class="col-sm-6">

        <div class="form-group">
            <label for="user">المستخدم</label>
            <select wire:model="user" id="user" wire:change="getUserPermissionNames" class="form-control  "
                style="width: 100%;">

                <option class="text-gray " value="0" >ــــــ</option>
                @foreach ($data as $user)
                    <option value="{{ $user->name }}"> {{ $user->name }}</option>
                @endforeach

            </select>
        </div>
    </div>


    {{-- @foreach ($data as $user)
        <p>{{ $user->name }}</p>
    @endforeach --}}


    {{-- <button wire:click="createPermission"> fn()</button> --}}

    <div class="card mb-0">

        @if ( $show)
        <table class="table m-0 table-bordered">
            <tbody>


                    @foreach ($allPermissionNames as $permissionName)
                        <tr>
                            <td height='10px p-0 m-0'>{{ __('lan.' . $permissionName) }}</td>
                            <td class="p-0 m-0">
                                <div class="col-sm-6  d-flex justify-content-center align-items-center">
                                    <div
                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" wire:key='{{ $permissionName }}'
                                            wire:change='cahngePermissionState("{{ $permissionName }}")'
                                            value="{{ $permissionName }}"
                                            @if (count($userPermissionNames) > 0)

                                            @foreach ($userPermissionNames as $userPermissionName)
                                                {{ $userPermissionName == $permissionName ? 'checked'  : null }}
                                             @endforeach @endif
                                            class="custom-control-input " id="{{ $permissionName }}">

                                        <br>
                                        <label class="custom-control-label" for="{{ __($permissionName) }}"></label>

                                    </div>
                                </div>
                            </td>

                            </td>
                        </tr>
                    @endforeach


            </tbody>

        </table>
        <button wire:click='reload' class=" btn btn-outline-success">تأكيد  </button>

        @else
        <p class="text-gray btn btn-outline-primary text-center m-2">
لم يتم إختيار مستخدم
        </p>
    @endif
    @if (session()->has('message'))
            <div class=" alert  alert-success text-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>
