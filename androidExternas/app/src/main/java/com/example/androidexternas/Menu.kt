package com.example.androidexternas

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import com.example.androidexternas.databinding.ActivityMenuBinding
import com.example.androidexternas.databinding.ActivityVentana2Binding

class Menu : AppCompatActivity() {


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        val binding= ActivityMenuBinding.inflate(layoutInflater)

        setContentView(binding.root)


    }

    fun llamarVentana(view: View){
        val opcion1= Intent(this,MainActivity::class.java)
        startActivity(opcion1)
    }


    fun llamarVentana2(view: View){
        val opcion2= Intent(this,ventana2::class.java)
        startActivity(opcion2)

    }

    fun llamarVentana3(view: View){
        val opcion3= Intent(this,ventana3::class.java)
        startActivity(opcion3)

    }

    fun llamarVentana4(view: View){
        val opcion4= Intent(this,ventana4::class.java)
        startActivity(opcion4)

    }
}