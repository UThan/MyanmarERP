<x-slot name="title">
    <x-admin-title title='Add New Book' :dirs="['home' => 'home', 'book' => 'book','add' => 'addbook']" />
</x-slot>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <form wire:submit.prevent="submit">
                <div class="card-body">            
                    <div class="form-row">
                        <div class="col">
                            <x-form.input name="field.title" label="Title" placeholder="Enter book title" />
                        </div>
                        <div class="col">
                            <x-form.input name="field.book_no" label="Book Number" type="number"
                                placeholder="Enter book number" />
                        </div>
                    </div>
        
                    <div class="form-row">
                        <div class="col">
                            <x-form.input name="field.copies_owned" label="No of copies" type="number"
                                placeholder="Enter no of copies owned" />
                        </div>
                        <div class="col">
                            <x-form.input name="field.pages" label="Pages" type="number" placeholder="Enter pages a in book" />
                        </div>
                    </div>
        <hr>
                    <div class="form-row">
                        <div class="col">
                            <x-form.select multiple='multiple' :options='$authors' name="field.author"
                                placeholder="Enter author name">
                                <x-slot name='label'>
                                    Author Name
                                    <a href="#" class="ml-2" data-toggle="modal" data-target="#modalauthor">+new</a>
        
                                    <x-modal id="modalauthor">
                                        @livewire('setting.create-record', ['name'=>'Author'],key('author'))
                                    </x-modal>
                                </x-slot>
                            </x-form.select>
                        </div>
        
                        <div class="col">
                            <x-form.select :options='$genres' name="field.genre" placeholder="Enter book genre"
                                multiple='multiple'>
                                <x-slot name='label'>
                                    Genre
                                    <a href="#" class="ml-2" data-toggle="modal" data-target="#modalgenre">+new</a>
        
                                    <x-modal id="modalgenre">
                                        @livewire('setting.create-record', ['name'=>'Genre'],key('genre'))
                                    </x-modal>
                                </x-slot>
                            </x-form.select>
                        </div>
                    </div>
        <hr>
                    <div class="form-row">
                        <div class="col">
                            <x-form.select :options='$categories' name="field.level" label="Category"
                                placeholder="Select category" />
                        </div>
                        <div class="col">
                            <x-form.select :options='$levels' name="field.level" label="Level" placeholder="Select level" />
                        </div>
                    </div>
        
                    <div class="form-row">
                        <div class="col">
                            <x-form.select :options='$settings' name="field.setting" placeholder="Select setting / location">
                                <x-slot name='label'>
                                    Setting
                                    <a href="#" class="ml-2" data-toggle="modal" data-target="#modalsetting">+new</a>
        
                                    <x-modal id="modalsetting">
                                        @livewire('setting.create-record', ['name'=>'Setting'],key('setting'))
                                    </x-modal>
                                </x-slot>
                            </x-form.select>
                        </div>
                        <div class="col">
                            <x-form.select :options='$series' name="field.series" label="Series"
                                placeholder="Select series name">
                                <x-slot name='label'>
                                    Series
                                    <a href="#" class="ml-2" data-toggle="modal" data-target="#modalseries">+new</a>
        
                                    <x-modal id="modalseries">
                                        @livewire('setting.create-record', ['name'=>'Series'],key('series'))
                                    </x-modal>
                                </x-slot>
                            </x-form.select>
                        </div>
                    </div>
               
        
                </div>
        
                <div class="card-footer">
                    <button class="btn btn-primary float-right">Save Book</button>
                </div>
        
            </form>
        
        </div>
        
    </div>
</div>