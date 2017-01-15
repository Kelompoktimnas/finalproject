package com.event;

import android.graphics.Bitmap;

public class Event {

	private Bitmap icon;

	private String eventID;
	private String judul;
	private String tanggal;
	private String lokasi;
	private String jam;

	public Event(Bitmap ic,String eid, String j, String tgl,
			String jm, String lok) {
		icon = ic;
		eventID = eid;
		judul = j;
		tanggal = tgl;
		lokasi = lok;
		jam = jm;

	}

	public Bitmap getIcon() {
		return icon;
	}

	public void setIcon(Bitmap icon) {
		this.icon = icon;
	}

	public String getEventID() {
		return eventID;
	}

	public void setEventID(String eventID) {
		this.eventID = eventID;
	}

	public String getJudul() {
		return judul;
	}

	public void setJudul(String judul) {
		this.judul = judul;
	}

	public String getTanggal() {
		return tanggal;
	}

	public void setTanggal(String tanggal) {
		this.tanggal = tanggal;
	}

	public String getLokasi() {
		return lokasi;
	}

	public void setLokasi(String lokasi) {
		this.lokasi = lokasi;
	}

	public String getJam() {
		return jam;
	}

	public void setJam(String jam) {
		this.jam = jam;
	}

}
