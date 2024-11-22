package com.example.appcriatil.RoomDB

import androidx.room.Entity
import androidx.room.PrimaryKey


@Entity
data class Usuario(

    val nomeValue: String,
    val emailValue: String,
    val telValue: String,
    val cepValue: String,
    val senhaValue: String,
    val logValue: Boolean = false,

    @PrimaryKey(autoGenerate = true)
    val idCliente: Int = 0
)