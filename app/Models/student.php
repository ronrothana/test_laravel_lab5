<?php

namespace App\Models;

class Student
{
    // Static array to hold multiple students
    protected static $data = [
        ['id' => 1, 'name' => 'Tina Tito', 'age' => 20, 'grade' => 'A'],
        ['id' => 2, 'name' => 'Ron Rothana', 'age' => 19, 'grade' => 'B'],
    ];

    public static function all()
    {
        return self::$data;
    }

    public static function find($id)
    {
        foreach (self::$data as $student) {
            if ($student['id'] == $id) {
                return $student;
            }
        }
        return null;
    }

    public static function create($student)
    {
        // Prevent duplicate IDs
        foreach (self::$data as $s) {
            if ($s['id'] == $student['id']) {
                return false;
            }
        }
        self::$data[] = $student;
        return true;
    }

    public static function delete($id)
    {
        foreach (self::$data as $index => $student) {
            if ($student['id'] == $id) {
                unset(self::$data[$index]);
                self::$data = array_values(self::$data); // Reindex
                return true;
            }
        }
        return false;
    }

    public static function update($id, $newData)
    {
        foreach (self::$data as $index => $student) {
            if ($student['id'] == $id) {
                self::$data[$index] = array_merge($student, $newData);
                return true;
            }
        }
        return false;
    }
}
