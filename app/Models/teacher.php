<?php

namespace App\Models;

class Teacher
{
    protected static $data = [
        ['id' => 1, 'name' => 'Mr. Bunchhun', 'subject' => 'Data Structure'],
        ['id' => 2, 'name' => 'Ms. Saktika', 'subject' => 'Programming Language'],
    ];

    public static function all()
    {
        return self::$data;
    }

    public static function find($id)
    {
        foreach (self::$data as $teacher) {
            if ($teacher['id'] == $id) {
                return $teacher;
            }
        }
        return null;
    }

    public static function create($teacher)
    {
        foreach (self::$data as $t) {
            if ($t['id'] == $teacher['id']) {
                return false;
            }
        }
        self::$data[] = $teacher;
        return true;
    }

    public static function delete($id)
    {
        foreach (self::$data as $index => $teacher) {
            if ($teacher['id'] == $id) {
                unset(self::$data[$index]);
                self::$data = array_values(self::$data);
                return true;
            }
        }
        return false;
    }

    public static function update($id, $newData)
    {
        foreach (self::$data as $index => $teacher) {
            if ($teacher['id'] == $id) {
                self::$data[$index] = array_merge($teacher, $newData);
                return true;
            }
        }
        return false;
    }
}
