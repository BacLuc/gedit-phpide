<?php
# Copyright (C) 2015 Gerrit Addiks <gerrit@addiks.net>
# https://github.com/addiks/gedit-phpide
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.

$writeHandle = fopen("php.internals.csv", "w");

foreach(get_defined_functions()["internal"] as $name){
    fputcsv($writeHandle, ['function', $name, null]);
}

foreach(get_declared_classes() as $name){
    fputcsv($writeHandle, ['class', $name, null]);
}

foreach(get_declared_interfaces() as $name){
    fputcsv($writeHandle, ['interface', $name, null]);
}

foreach(get_defined_vars() as $name => $value){
    if(!in_array($name, array('writeHandle', 'name', 'value', 'group', 'groupKey'))){
        fputcsv($writeHandle, ['variable', $name, null]);
    }
}

foreach(get_defined_constants() as $name => $value){

    fputcsv($writeHandle, ['constant', $name, $value]);
}

fclose($writeHandle);
