select plots.*, areas.name, areas.id
from plots join areas on plots.area_id = areas.id
where areas.id = 12
order by (plots.id);

select flats.*, plots.plot_no
from flats join plots on flats.plot_id = plots.id
order by (plots.plot_no);

select *
from plots
where plots.area_id = 2;

select areas.id as area_id, areas.name as area_name, plots.id as plot_id, plots.plot_no, flats.*
from flats join plots on flats.plot_id = plots.id join areas on plots.area_id = areas.id
where flats.id = 1;

select areas.id, areas.name
from areas
where id <> 2;

select areas.id as area_id, areas.name as area_name, plots.id as plot_id, plots.plot_no, land_owners.id, land_owners.name
from land_owners join plots on land_owners.plot_id = plots.id
    join areas on plots.area_id = areas.id
where land_owners.id = 1;

select areas.id as area_id, areas.name as area_name,
       plots.id as plot_id, plots.plot_no,
       flats.flat_no, flat_owners.*
from flat_owners join flats on flat_owners.flat_id = flats.id
    join plots on flats.plot_id = plots.id
    join areas on plots.area_id = areas.id;

select *
from flats
where flats.plot_id = 1;

select areas.id as area_id, areas.name as area_name,
       plots.id as plot_id, plots.plot_no,
       flats.flat_no, flat_owners.*
from flat_owners join flats on flat_owners.flat_id = flats.id
    join plots on flats.plot_id = plots.id
    join areas on plots.area_id = areas.id
where flat_owners.id = 1;

select areas.id as area_id, areas.name as area_name
from flat_owners
         join flats on flat_owners.flat_id = flats.id
join plots on flats.plot_id = plots.id
join areas on plots.area_id = areas.id
where flat_owners.id = 1;



