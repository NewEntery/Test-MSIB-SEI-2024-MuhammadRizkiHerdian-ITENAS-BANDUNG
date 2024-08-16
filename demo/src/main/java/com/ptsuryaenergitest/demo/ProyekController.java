package com.ptsuryaenergitest.demo;
import java.util.List;
import java.util.Map; // Add this import statement
import java.util.HashMap; // Add this import statement
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

@RestController
@RequestMapping("/proyek")
public class ProyekController {
    private static final Logger logger = LoggerFactory.getLogger(ProyekController.class);
    @Autowired
    private ProyekRepository proyekRepository;

    @Autowired
    private LokasiRepository lokasiRepository;

    @PostMapping
    public Proyek createProyek(@RequestBody Proyek proyek) {
        
        List<lokasi> lokasiList = proyek.getLokasi();
        logger.info("Ini adalah log info");
        for (lokasi lokasi : lokasiList) {
            lokasiRepository.findById(lokasi.getId())
                    .orElseThrow(() -> new ResourceNotFoundException("Lokasi not found for this id :: " + lokasi.getId()));
        }
        return proyekRepository.save(proyek);
    }

    @GetMapping
    public List<Proyek> getAllProyek() {
        return proyekRepository.findAll();
    }

    @GetMapping("/{id}")
public ResponseEntity<Proyek> getProyekById(@PathVariable Long id) {
    Proyek proyek = proyekRepository.findById(id.intValue())
            .orElseThrow(() -> new ResourceNotFoundException("Proyek not found for this id :: " + id));
    return ResponseEntity.ok(proyek);
}

    @PutMapping("/{id}")
    public ResponseEntity<Proyek> updateProyek(@PathVariable Long id, @RequestBody Proyek proyekDetails) {
        Proyek proyek = proyekRepository.findById(id.intValue())
                .orElseThrow(() -> new ResourceNotFoundException("Proyek not found for this id :: " + id));

        proyek.setNamaProyek(proyekDetails.getNamaProyek());
        proyek.setClient(proyekDetails.getClient());
        proyek.setTglMulai(proyekDetails.getTglMulai());
        proyek.setTglSelesai(proyekDetails.getTglSelesai());
        proyek.setPimpinanProyek(proyekDetails.getPimpinanProyek());
        proyek.setKeterangan(proyekDetails.getKeterangan());
        proyek.setLokasi(proyekDetails.getLokasi());

        final Proyek updatedProyek = proyekRepository.save(proyek);
        return ResponseEntity.ok(updatedProyek);
    }

    @DeleteMapping("/{id}")
    public Map<String, Boolean> deleteProyek(@PathVariable Long id) {
        Proyek proyek = proyekRepository.findById(id.intValue())
                .orElseThrow(() -> new ResourceNotFoundException("Proyek not found for this id :: " + id));

        proyekRepository.delete(proyek);
        Map<String, Boolean> response = new HashMap<>();
        response.put("deleted", Boolean.TRUE);
        return response;
    }
}
