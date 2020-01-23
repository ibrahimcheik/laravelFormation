<div class="form-group">
    <label for="name">Name :</label>
    <input class="form-control" type="text" name="name" placeholder="Your Name Here" value="{{ old('name') ?? $customer->name }}">
    <div>{{ $errors->first('name') }}</div>
</div>
<div class="form-group">
    <label for="email">Email :</label>
    <input class="form-control" type="text" name="email" placeholder="Your Email Here" value="{{ old('email') ?? $customer->email }}">
    <div>{{ $errors->first('email') }}</div>
</div>
<div class="form-group">
    <label for="status">Status :</label>
    <select name="active" id="active" class="form-control">
        <option value="" disabled>select status</option>
        <option value="1" {{ $customer->active == 'Active' ? 'selected' : '' }}>Active</option>
        <option value="0" {{ $customer->active == 'Inactive' ? 'selected' : '' }}>Inactive</option>
        <option value="2" {{ $customer->active == 'OnProgress' ? 'selected' : '' }}>OnProgress</option>
    </select>
    <div>{{ $errors->first('status') }}</div>
</div>
<div class="form-group">
    <label for="company_id">Company :</label>
    <select name="company_id" id="company_id" class="form-control">
           @foreach($companies as $company)
           {
            <option value="{{ $company->id }}" {{ $company->id == $customer->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
           }
           @endforeach
    </select>
</div>
@csrf